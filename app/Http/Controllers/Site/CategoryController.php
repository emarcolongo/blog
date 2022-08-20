<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Post;
Use App\Models\User;
Use App\Models\Category;

class CategoryController extends Controller
{
    private $category;

    public function __constructor(Category $category, Post $posts) {
        $this->category = $category;
    }

    public function index($slug) {
        $category = Category::whereSlug($slug)->first();
        $posts = $category ? $category->posts()->paginate(15) : null;
        return view('site.category', compact('category','posts'));
    }
}
