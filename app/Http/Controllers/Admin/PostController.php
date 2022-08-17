<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Post;
Use App\Models\User;

class PostController extends Controller
{
    public function index() {
        $posts = Post::paginate(15);
        return view('posts.index',compact('posts'));
    }

    public function show($id) {
        $post = Post::findOrFail($id);
        return view('posts.edit',compact('post'));
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
        $data['is_active'] = true;
        $user = User::find(1);
        //dd(Post::create($data));
        dd($user->posts()->create($data));
    }

    public function update($id, Request $request) {
        $data = $request->all();
        $post = Post::findOrFail($id);
        dd($post->update($data));
    }

    public function destroy($id, Request $request) {
        $post = Post::findOrFail($id);
        dd($post->delete());
    }

}
