<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use App\Models\Post;

class CommentController extends Controller
{
    public function saveComment(CommentRequest $request) {
        try {
            $comment = $request->get('comment');
            $post = Post::find($request->get('post_id'));
            $post->comments()->create([
                'comment' => $comment,
                'status' => true
            ]);
            flash('Comentário criado com Sucesso!')->success();
            return redirect()->route('site.single',['slug'=>$post->slug]);
        } catch (\Exception $e) {
            $message = 'Erro ao criar o comentário';
            if (env('APP_DEBUG')) {
                $message = $e->getMessage();
            }
            flash($message)->warning();
            return redirect()->back();
        }
    }
}
