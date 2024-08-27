<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Http\Controllers\userController;

Route::resource('posts', postController::class);



Route::post('/posts/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');


#region Routes
// GET|HEAD        posts ............................................ posts.index › postController@index
// POST            posts ............................................ posts.store › postController@store
// GET|HEAD        posts/create ................................... posts.create › postController@create
// GET|HEAD        posts/{post} ....................................... posts.show › postController@show
// PUT|PATCH       posts/{post} ................................... posts.update › postController@update
// DELETE          posts/{post} ................................. posts.destroy › postController@destroy
// GET|HEAD        posts/{post}/edit .................................. posts.edit › postController@edit
// GET|HEAD        up ..................................................................................
#endregion

Route::resource('users', userController::class);

#region Routes
// GET|HEAD        users ............................................ users.index › userController@index
// POST            users ............................................ users.store › userController@store
// GET|HEAD        users/create ................................... users.create › userController@create
// GET|HEAD        users/{user} ....................................... users.show › userController@show
// PUT|PATCH       users/{user} ................................... users.update › userController@update
// DELETE          users/{user} ................................. users.destroy › userController@destroy
// GET|HEAD        users/{user}/edit .................................. users.edit › userController@edit
#endregion
