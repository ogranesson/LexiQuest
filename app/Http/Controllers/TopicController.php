<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class TopicController extends Controller
{
    public function show($id) {
        try {
            $topic = Topic::findOrFail($id);

            $author = DB::table('topics')
                    ->join('users', 'users.id', '=', 'topics.user_id')
                    ->where('topics.id', '=', $id)
                    ->select('users.first_name', 'users.last_name')
                    ->first();
                    
            $posts = DB::table('posts')
                    ->join('users', 'users.id', '=', 'posts.user_id')
                    ->where('posts.topic_id', '=', $id)
                    ->select('posts.*', 'users.first_name', 'users.last_name')
                    ->get();

            $categories = DB::table('categories')
                        ->join('topic_categories', 'topic_categories.category_id', '=', 'categories.id')
                        ->join('topics', 'topics.id', '=', 'topic_categories.topic_id')
                        ->where('topics.id', '=', $id)
                        ->select('categories.name')
                        ->get();
            return view('topic', ['topic' => $topic, 'author' => $author, 'posts' => $posts, 'categories' => $categories]);
        } catch (ModelNotFoundException $e) {
            return response()->view('errors.404', [], 404);
        }
    }

    public function show_create() {
        $categories = DB::table('categories')
                        ->select('categories.name')
                        ->get();

        return view('create-topic', ['categories' => $categories]);
    }

    public function create() {
        //
    }
}
