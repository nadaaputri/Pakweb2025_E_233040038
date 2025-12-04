<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/categories', [CategoryController::class, 'index']);
