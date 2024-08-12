<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function post(Request $request, $topic_id) {
        $content = $request->input('post-text');
        $user_id = 1; // placeholder

        Post::create([
            'content' => $content,
            'user_id' => $user_id,
            'topic_id' => $topic_id
        ]);

        return redirect()->route('topic', ['id'=>$topic_id]);
    }

    public function edit(Request $request, $topic_id, $post_id) {
        $post = Post::findOrFail($post_id);
        $post->content = $request->input('content');
        $post->save();

        return redirect()->route('topic', ['id'=>$topic_id]);
    }

    public function delete(Request $request, $topic_id, $post_id) {
        $post = Post::findOrFail($post_id);
        $post->delete();
        
        return redirect()->route('topic', ['id'=>$topic_id]);
    }
}
