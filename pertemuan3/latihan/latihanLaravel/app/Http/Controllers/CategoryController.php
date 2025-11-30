<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Iluminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories', [
            'title' => 'Post Categories', 
            'categories' => Category::all()
            ]);
    }
}