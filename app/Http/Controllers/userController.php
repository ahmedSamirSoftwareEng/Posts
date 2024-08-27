<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class userController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(3);
        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {

        $posts = $user->posts;
        return view('users.show', compact('user'), compact('posts'));
    }
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8'
        ]);


        $user = User::create($request->all());
        return to_route('users.show', $user);
    }
    function edit(User $user){

        return view('users.edit',compact('user'));
    }

    function update(Request $request, User $user){
        // check if user is changing his email
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:8|confirmed',
        ]);

    //    check if user is not changing his password
        if($request->password == null){
            // put the old password in the request
            $request->request->add(['password' => $user->password]);

        }

        $user->update($request->all());
        return to_route('users.show', $user)->with('success', 'User updated successfully');
    }

    function destroy(User $user)
    {
        $user->delete();
        return to_route('users.index')->with('success', 'User deleted successfully');
    }
}
