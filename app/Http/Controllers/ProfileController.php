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
            Log::info($user_creation->floatDiffInDays($now));
            return view('profile', ['user' => $user, 'diff' => $diff]);
        } catch (ModelNotFoundException $e) {
            return response()->view('404', [], 404);
        }
    }
}
