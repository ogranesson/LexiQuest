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
}
