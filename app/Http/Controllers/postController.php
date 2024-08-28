<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostsRequest;
use Illuminate\Validation\Rule;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // paginate posts Retrieve both active and soft-deleted posts
        $posts = Post::withTrashed()->paginate(3);

        return view('posts.index', compact('posts'));
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();


        return redirect()->route('posts.index')->with('success', 'Post restored successfully!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // get all users
        $users = User::all();

        return view('posts.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $image_path = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_path = $image->store("", 'posts_images');
        }
        $request_data = $request->all();
        $request_data['image'] = $image_path;
        $post = Post::create($request_data);
        return to_route('posts.index', $post)->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)

    {
        $users = User::all();
        return view('posts.edit', compact('post'), compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostsRequest $request, Post $post)
    {
        if ($request->hasFile('image')) {
            // delete old image
            if ($post->image) {
                $path = public_path('posts_images/images/' . $post->image);
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            $image = $request->file('image');
            $image_path = $image->store("", 'posts_images');
        }
        $request_data = $request->all();
        $request_data['image'] = $image_path;
        $post->update($request_data);
        return to_route('posts.index', $post)->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // delete image
        if ($post->image) {
            $path = public_path('posts_images/images/' . $post->image);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $post->delete();
        return to_route('posts.index')->with('success', 'Post deleted successfully');
    }





}
