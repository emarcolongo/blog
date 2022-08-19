<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
Use App\Models\Post;
Use App\Models\User;
Use App\Models\Category;
Use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    private $post;

    public function __constructor(Post $post) {
        $this->post = $post;
    }

    public function index() {
        $posts = Post::paginate(15);
        return view('posts.index',compact('posts'));
    }

    public function create(){
        $categories = Category::all(['id','name']);
        return view('posts.create',compact('categories'));
    }

    public function store(PostRequest $request) {
         $data = $request->all();
         try {
             if ($request->hasFile('thumb')) {
                $data['thumb'] = $request->file('thumb')->store('thumbs','public');
             } else {
                unset($data['thumb']);
             }
             $data['is_active'] = true;
             $user = auth()->user();
             $post = $user->posts()->create($data);
             $post->categories()->sync($data['categories']);
             flash('Postagem inserida com sucesso !!')->success();
             return redirect()->route('posts.index');
         } catch (\Execption $e) {
             $message = 'Erro ao inserir a postagem!';
             if (env('APP_DEBUG')) {
                 $message = $e->getMessage();
             }
             flash($message)->warning();
             return redirect()->back();
         }
    }    

    public function show(Post $post) {
        $categories = Category::all(['id','name']);
        return view('posts.edit',compact('post','categories'));
    }

    public function update(Post $post, PostRequest $request) {
        $data = $request->all();
        try {
            if ($request->hasFile('thumb')) {
                Storage::disk('public')->delete($post->thumb);
                $data['thumb'] = $request->file('thumb')->store('thumbs','public');
            } else {
                unset($data['thumb']);
            }
            $post->update($data);
            $post->categories()->sync($data['categories']);
            flash('Postagem atualizada com Sucesso!')->success();
            return redirect()->route('posts.show',[$post->id]);
        } catch (\Exception $e) {
            $message = 'Erro ao atualizar postagem!';

            if (env('APP_DEBUG')) {
                $message = $e->getMessage();
            }

            flash($message)->warning();
            return redirect()->back();
        }
    }

    public function destroy(Post $post) {
        try {
            $post->delete($post);
            flash('Postagem removida com Sucesso!')->success();
            return redirect()->route('posts.index');
        } catch (\Exception $e) {
            $message = 'Erro ao remover postagem!';

            if (env('APP_DEBUG')) {
                $message = $e->getMessage();
            }

            flash($message)->warning();
            return redirect()->back();
        }
    }

}
