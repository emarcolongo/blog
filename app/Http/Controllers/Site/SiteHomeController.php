<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Post;
Use App\Models\User;
Use App\Models\Category;


class SiteHomeController extends Controller
{
    private $post;

    public function __constructor(Post $post) {
        $this->post = $post;
    }

    public function index() {
        $posts = Post::orderBy('id','desc')->paginate(15);
        return view('site.posts.index',compact('posts'));
    }

    public function single($slug) {
        $post = Post::whereSlug($slug)->first();
        return view('site.posts.single',compact($post));
    }
}
