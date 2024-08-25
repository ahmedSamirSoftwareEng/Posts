<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;


Route::get('/', [postController::class, 'index'])->name('showPosts');
Route::get('/posts/create', [postController::class, 'createPost'])->name('createPost');
Route::get('/posts/{id}', [postController::class, 'showPost'])->name('showPost')->where('id', '[0-9]+');
Route::get('/posts/{post}/edit', [postController::class, 'editPost'])->name('editPost');



