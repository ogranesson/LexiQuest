<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

// topic routes
Route::get('/topic/{id}', [TopicController::class, 'show'])->name('topic');

// post routes
Route::post('/topic/{id}/post', [PostController::class, 'post'])->name('submit-post');
Route::post('/topic/{id}/{post_id}/edit', [PostController::class, 'edit'])->name('edit-post');
Route::delete('/topic/{id}/{post_id}/delete', [PostController::class, 'delete'])->name('delete-post');
