<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\User;

class ProfileController extends Controller
{
    public function view($username) {
        try {
            $user = User::where('username', $username)->firstOrFail();
            return view('profile', ['user' => $user]);
        } catch (ModelNotFoundException $e) {
            return response()->view('404', [], 404);
        }
    }
}
