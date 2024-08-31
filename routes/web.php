<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;





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



Auth::routes();


Route::get('/', [HomeController::class, 'index'])->name('home');

// GET|HEAD        login ....................... login › Auth\LoginController@showLoginForm
//   POST            login ......................................... Auth\LoginController@login
//   POST            logout .......................... logout › Auth\LoginController@logout
// GET|HEAD        register ....................... register › Auth\RegisterController@showRegistrationForm
// POST            register .............................................. Auth\RegisterController@register



#region login with github


Route::get('/auth/redirect', function () {
    // return "github";
    return Socialite::driver('github')->redirect();
})->name('github.login');

Route::get('/auth/callback', function () {
    // return "redirected";

        // $user = Socialite::driver('github')->stateless()->user();
        // dd($user);
    // $user->token

    $githubUser = Socialite::driver('github')->stateless()->user();

    $user = User::updateOrCreate([
        'github_id' => $githubUser->id,
    ], [
        'name' => $githubUser->nickname,
        'email' => $githubUser->email,
        'password' => $githubUser->token,
        'github_token' => $githubUser->token,
        'github_refresh_token' => $githubUser->refreshToken,
    ]);
 
    Auth::login($user);
 
    return redirect('/posts');

})->name('github.callback');
#endregion

