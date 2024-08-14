<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;

use App\Http\Middleware\AdminCheck;
use App\Http\Middleware\RedirectIfAuthenticated;

Auth::routes();

Route::group(['middleware' => function ($request, $next) {
    if (!Auth::check()) {
        return redirect()->route('register')->with('alert', 'You need to be logged in to access that page.');
    }
    return $next($request);
}], function() {
    // home page
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // topic routes
    Route::get('/topic/{id}', [TopicController::class, 'show'])->name('topic');

    // post routes
    Route::post('/topic/{id}/post', [PostController::class, 'post'])->name('submit-post');
    Route::post('/topic/{id}/{post_id}/edit', [PostController::class, 'edit'])->name('edit-post');
    Route::delete('/topic/{id}/{post_id}/delete', [PostController::class, 'delete'])->name('delete-post');

    // profile routes
    Route::get('/profile/{username}', [ProfileController::class, 'view'])->name('view-profile');
});

Route::middleware([AdminCheck::class])->group(function() {
    Route::get('/admin/dashboard', [AdminController::class, 'view'])->name('view-dashboard');
});

//forbidden page
Route::get('/forbidden', function() {
    return response()->view('403', [], 403);
})->name('forbidden');

//not found page
Route::get('/not-found', function() {
    return response()->view('404', [], 404);
})->name('not-found');

// catch any other URLs
Route::fallback(function () {
    return redirect()->route('not-found')->setStatusCode('404');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
})->middleware([RedirectIfAuthenticated::class]);