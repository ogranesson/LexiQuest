<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $topics = DB::table('topics')
                    ->join('users', 'users.id', '=', 'topics.user_id')
                    ->select('topics.*', 'users.username', 'users.photo')
                    ->orderBy('topics.created_on', 'desc')
                    ->paginate(10);

        return view('home', compact('topics'));
    }
}
