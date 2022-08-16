<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::paginate(15);
        dd($posts);
    }

    public function show($id) {
        $post = Post::findOrFail($id);
        dd($post);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request) {
        /*Metodo: Active Record
        $data = $request->all();
        $post = new Post();
        $post->title = $data['title'];
        $post->description = $data['description'];
        $post->content = $data['content'];
        $post->slug = $data['slug'];
        $post->is_active = true;
        $post->user_id = 1;
        dd($post->save());
        */

        /*Metodo: Mass Assignment */
        $data = $request->all();
        $data['user_id'] = 1;
        $data['is_active'] = true;
        dd(Post::create($data));
    }

}
