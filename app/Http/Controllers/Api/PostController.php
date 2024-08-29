<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostsRequest;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum')->only(['store', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PostResource::collection(Post::all());
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
        $request_data['user_id'] = Auth::user()->id;
        $post=Post::create($request_data);
        return $post;

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return new PostResource($post);
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
            // upload new image
            $image = $request->file('image');
            $image_path = $image->store("", 'posts_images');
        }
        $request_data = $request->all();
        $request_data['image'] = $image_path != null ? $image_path : $post->image;
        $post->update($request_data);

        return $post;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,Post $post)
    {

        if( Auth::user()->id == $post->user_id){
        if ($post->image) {
            $path = public_path('posts_images/images/' . $post->image);
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $post->delete();
        return "post deleted successfully";
    }else{
        return "you can't delete this post";
    }
    }
}
