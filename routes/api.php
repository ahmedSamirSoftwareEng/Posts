
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\PostController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('posts', PostController::class);
#region Routes
// GET|HEAD        / ............................... home › HomeController@index
//   GET|HEAD        api/posts ....................... posts.index › Api\PostController@index
//   POST            api/posts ......................... posts.store › Api\PostController@store
//   GET|HEAD        api/posts/{post} ................... posts.show › Api\PostController@show
//   PUT|PATCH       api/posts/{post} ................ posts.update › Api\PostController@update
//   DELETE          api/posts/{post} ............... posts.destroy › Api\PostController@destroy
//   GET|HEAD        api/user ....
#endregion


#region Routes of Authentication
// POST            /sanctum/token ................... sanctum.token
Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->device_name)->plainTextToken;
});



#endregion




Route::post('/sanctum/logout', function (Request $request) {
    if (! Auth::check()) {
        return response()->json(['message' => 'Unauthorized'], 401);
    } else {
        // Revoke the token that was used to authenticate the current request
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logout successfully'], 200);
    }
})->middleware('auth:sanctum');
