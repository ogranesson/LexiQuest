<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicController;

Route::get('/', function () {
    return view('welcome');
});

// topic routes
Route::get('/topic/{id}', [TopicController::class, 'show'])->name('topic');
