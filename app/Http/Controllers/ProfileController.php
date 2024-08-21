<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function view($username) {
        try {
            $user = User::where('username', $username)->firstOrFail();

            $now = Carbon::now();
            $user_creation = Carbon::parse($user->created_on);

            $diff = $user_creation->diffForHumans($now);

            return view('profile', ['user' => $user, 'diff' => $diff]);
        } catch (ModelNotFoundException $e) {
            return response()->view('errors.404', [], 404);
        }
    }

    public function edit($username) {
        //
    }

    public function ban($username) {
        try {
            $user = User::where('username', $username)->firstOrFail();

            if($user->is_banned != 1) {
                $user->is_banned = 1;
                $user->save();
            }
            else {
                return redirect()->back()->with('error', 'User is already banned!');
            }

            return redirect()->back();
        } catch (ModelNotFoundException $e) {
            return response()->view('errors.404', ['message' => 'User \''. $username. '\' not found.'], 404);
        }
    }

    public function unban($username) {
        try {
            $user = User::where('username', $username)->firstOrFail();

            if($user->is_banned != 0) {
                $user->is_banned = 0;
                $user->save();
            }
            else {
                return redirect()->back()->with('error', 'User is not banned!');
            }

            return redirect()->back();
        } catch (ModelNotFoundException $e) {
            return response()->view('errors.404', ['message' => 'User \''. $username. '\' not found.'], 404);
        }
    }
}
