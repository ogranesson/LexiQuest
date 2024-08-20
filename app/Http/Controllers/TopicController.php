<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Topic;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
                        ->select('*')
                        ->get();
        
        Log::info($categories);

        return view('create-topic', ['categories' => $categories]);
    }

    public function create(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'categories' => 'required|array',
        ]);

        $name = $request->get('name');
        $categories = $request->get('categories');
        $user_id = Auth::user()->id;
        do {
            $id = random_int(1001234, 2000000);
        } while (Topic::find($id) !== null);

        $new_topic = Topic::create([
            'id' => $id,
            'user_id' => $user_id,
            'name' => $name
        ]);

        $new_topic->categories()->attach($categories);

        return redirect()->route('topic', ['id' => $id]);
    }
}
