<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $blogs = $category->blogs()->paginate(6);
        return view('blog.blog', compact('blogs', 'category'));
    }
}
