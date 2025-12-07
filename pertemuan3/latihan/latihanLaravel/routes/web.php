<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardCategoryController;

//contoh route untuk menampilkan view
Route::get('/', function () {
//return Auth::check() ? redirect('/posts') : redirect('/login');
    return view('home', [
        "title" => "Home",
        "active" => "home"
    ]);
//->middleware('auth');
});

Route::get('/about', function () {
    return view('about');
});
//->middleware('auth');

Route::get('/blog', function () {
    return view('blog');
});
//->middleware('auth');

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories', function () {
    return view('categories');
});
//->middleware('auth');

//Route::get('/posts', function () {
//    return view('posts');
//});
//->middleware('auth');

Route::get('/contact', function () {
    return view('contact');
});
//->middleware('auth');

//Protected posts dan catgories dengan auth middleware
//Route dari laraveltest-main
Route::get('/posts', [PostController::class, 'index'])->middleware('auth')->name('posts.index');

//Route model binding dengan slug
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->middleware('auth')->name('posts.show');

//Route untuk register - middleware guest (hanya untuk yang belum login)
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest');

//Route untuk login - middleware guest (hanya untuk yang belum login)
Route::get('/login', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');

//Route logout - hanya untuk yang sudah login
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


//Route untuk dashboard posts - hanya untuk yang sudah login
Route::middleware(['auth'])->group(function () {

    // 1. Dashboard index
    Route::get('/dashboard', [DashboardPostController::class, 'index'])->name('dashboard.index');
    Route::resource('/dashboard/categories', DashboardCategoryController::class)->except('show');

    // 2. Create: Menampilkan formulir tambah postingan
    Route::get('/dashboard/create', [DashboardPostController::class, 'create'])->name('dashboard.create');

    // 3. Store: Proses menyimpan postingan baru ke database
    Route::post('/dashboard/posts', [DashboardPostController::class, 'store'])->name('dashboard.store');

    // Edit: Menampilkan form edit
    Route::get('/dashboard/{post:slug}/edit', [DashboardPostController::class, 'edit'])->name('dashboard.edit');
    
    // Update: Proses menyimpan perubahan
    Route::put('/dashboard/{post:slug}', [DashboardPostController::class, 'update'])->name('dashboard.update');

    // Delete: Menghapus data
    Route::delete('/dashboard/{post:slug}', [DashboardPostController::class, 'destroy'])->name('dashboard.destroy');

    // 4. Show: Menampilkan detail postingan tertentu
    Route::get('/dashboard/{post:slug}', [DashboardPostController::class, 'show'])->name('dashboard.show');
});
