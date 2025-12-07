<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardCategoryController extends Controller
{
    /**
     * Menampilkan daftar kaetegori.
     */
    public function index()
    {
        return view('dashboard.categories.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Menampilkan form tambah.
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Menyimpan data baru.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:categories,name',
        ]);

        // Buat slug dari nama kategori
        $validatedData['slug'] = Str::slug($request->name);
        Category::create($validatedData);
        return redirect('/dashboard/categories')->with('success', 'Category created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Menampilkan form edit.
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $rules = [
            'name' => 'required|max:255|unique:categories,name,' . $category->id,
        ];

        $validatedData = $request->validate($rules);

        // Update slug jika nama kategori diubah
        if ($request->name != $category->name) {
            $validatedData['slug'] = Str::slug($request->name);
        }

        Category::where('id', $category->id)->update($validatedData);
        return redirect('/dashboard/categories')->with('success', 'Category updated successfully!');
    }
    

    /**
     * Hapus Data.
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return redirect('/dashboard/categories')->with('success', 'Category deleted successfully!');
    }
}
