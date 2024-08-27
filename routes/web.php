<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;


Route::get('/', [postController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [postController::class, 'createPost'])->name('posts.create');
Route::get('/posts/{id}', [postController::class, 'showPost'])->name('posts.show')->where('id', '[0-9]+');
Route::get('/posts/{id}/edit', [postController::class, 'editPost'])->name('posts.edit')->where('id', '[0-9]+');
Route::Post('/posts/{id}/update', [postController::class, 'updatePost'])->name('posts.update')->where('id', '[0-9]+');
Route::get('/posts/{id}/destroy', [postController::class, 'destroyPost'])->name('posts.destroy');
Route::post('/posts/store', [postController::class, 'storePost'])->name('posts.store');




