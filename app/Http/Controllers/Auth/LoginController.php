<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request) === 'banned') {
            return redirect()->back()->withErrors([
                'login' => 'You\'re banned. Oops.',
            ]);
        }

        if ($this->attemptLogin($request)) {
            $request->session()->regenerateToken();
            return redirect('/');
        }

        return redirect()->back()->withErrors([
            'login' => 'The email, username or password provided is incorrect.',
        ]);
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);
    }

    protected function attemptLogin(Request $request)
    {
        $loginType = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username'; // accepting either email or username

        $user = User::where($loginType, $request->input('login'))->first();

        if ($user && $user->is_banned == 1) {
            return 'banned';
        }

        return Auth::attempt([
            $loginType => $request->input('login'),
            'password' => $request->input('password'),
        ], $request->filled('remember'));
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
