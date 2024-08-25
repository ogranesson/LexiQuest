<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

use App\Http\Middleware\AdminCheck;
use App\Http\Middleware\RedirectIfAuthenticated;

Auth::routes();

Route::get('/', function () { // Redirect if authenticated
    return Auth::check() ? redirect()->route('index') : view('welcome');
})->name('home');

Route::group(['middleware' => function ($request, $next) {
    if (!Auth::check()) {
        return redirect()->route('register')->with('alert', 'You need to be logged in to access that page.');
    }
    return $next($request);
}], function() {

    Route::get('/home', [HomeController::class, 'index'])->name('index');

    // topic routes
    Route::get('/topic/create', [TopicController::class, 'show_create'])->name('create-topic');
    Route::post('/topic/create/submit', [TopicController::class, 'create'])->name('submit-topic');
    Route::get('/topic/{id}', [TopicController::class, 'show'])->name('topic');

    // post routes
    Route::post('/topic/{id}/post', [PostController::class, 'post'])->name('submit-post');
    Route::put('/{post_id}/edit', [PostController::class, 'edit'])->name('edit-post');
    Route::delete('/{post_id}/delete', [PostController::class, 'delete'])->name('delete-post');

    // profile routes
    Route::get('/profile/{username}', [ProfileController::class, 'view'])->name('view-profile');
    Route::get('/profile/{username}/edit', [ProfileController::class, 'edit'])->name('edit-profile');
    Route::put('/profile/{username}/save', [ProfileController::class, 'save'])->name('save-profile');
});

Route::middleware([AdminCheck::class])->group(function() {
    Route::get('/admin/dashboard', [AdminController::class, 'view'])->name('view-dashboard');
    Route::put('/{username}/ban', [ProfileController::class, 'ban'])->name('ban-user');
    Route::put('/{username}/unban', [ProfileController::class, 'unban'])->name('unban-user');
});

// catch any other URLs
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
