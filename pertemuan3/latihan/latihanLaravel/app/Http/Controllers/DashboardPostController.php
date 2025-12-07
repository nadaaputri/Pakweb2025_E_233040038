<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;


class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //menggunakan user_id dari use ryang sedang login
        $posts = Post::where('user_id', Auth::user()->id);

        //fitur search
        if(request('search')){
            $posts->where('title', 'like', '%' . request('search') . '%');
        }

        //menampilkan 5 data per halaman dengan pagination
        return view('dashboard.index', [
            'posts' => $posts->paginate(5)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua data kategori untuk dropdown
        $categories = Category::all();

        // Tampilkan halaman create dengan membawa data categories
        return view('dashboard.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        // 1. CEK DATA (VALIDASI)
        $validator = Validator::make($request->all(), [
            'title'       => 'required|max:255',
            'category_id' => 'required',
            'image'       => 'nullable|file|max:2048', // Validasi untuk file gambar
            'excerpt'     => 'required',
            'body'        => 'required',
        ]);

        //Jika data tidak lolos pengecekan
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        // 2. GENERATE SLUG
        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $count = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        //3. HANDLE GAMBAR
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('post-images', 'public');
        }
        // 4. Proses Simpan ke Database
        Post::create([
            'title'       => $request->title,
            'slug'        => $slug,
            'category_id' => $request->category_id,
            'excerpt'     => $request->excerpt,
            'body'        => $request->body,
            'image'       => $imagePath,
            'user_id'     => Auth::user()->id, // Ambil ID user yang sedang login
        ]);

        // 5. Redirect kembali ke Dashboard dengan pesan sukses
        return redirect()->route('dashboard.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.show', [
        'post' => $post
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //1. Validasi Data
        $rules=[
            'title'       => 'required|max:255',
            'category_id' => 'required',
            'image'       => 'image|file|max:2048',
            'excerpt'     => 'required',
            'body'        => 'required',
        ];

        $validatedData = $request->validate($rules);

        //2. Generate Slug baru
        if ($request->title != $post->title) {
            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $count = 1;
            while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }
            $validatedData['slug'] = $slug;
        }

        //3. Handle Ganti Gambar
        if ($request->hasFile('image')) {
            //Hapus gambar lama jika ada
            if ($post->image) {
                Storage::delete('public/'. $post->image);
            }
            //Simpan gambar baru
            $validatedData['image'] = $request->file('image')->store('post-images', 'public');
        }

        //4. Update Database
        $validatedData['user_id'] = Auth::user()->id;
        Post::where('id', $post->id)->update($validatedData);
        return redirect()->route('dashboard.index')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //1. Hapus gambar fisik
        if ($post->image) {
            Storage::delete('public/' . $post->image);
        }

        //2. Hapus data dari database
        Post::destroy($post->id);

        //3. Balik ke dashboard dengan pesan sukses
        return redirect()->route('dashboard.index')->with('success', 'Post deleted successfully!');
    }
}
