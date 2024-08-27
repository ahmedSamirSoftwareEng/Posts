<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;
use App\Models\Post;

class postController extends Controller
{
    private $creators = ['Ahmed', 'omar', 'ali', 'mohamed', 'hassan'];
    public function index()
    {
        $posts=Post::paginate(3);
        return view('posts.index', ['posts' => $posts]);
    }

    public function showPost($id)
    {
        $post = Post::find($id);
        return view('posts.show', ['post' => $post]);
    }
    public function destroyPost($id){
        $post=Post::find($id);
        $post->delete();
        return redirect('/');
    }
    public function createPost(){
        return view('posts.create');
    }

    public function storePost(Request $request){

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'posted_by' => ['required',Rule::in($this->creators)],
        ]);


        $request_data=$request->all();
        $post = new Post();
        $post->title = $request_data['title'];
        $post->description = $request_data['description'];
        $post->posted_by = $request_data['posted_by'];
        $post->save();
        return redirect('/');
    }

    public function editPost($id)
    {
        $post = Post::find($id);
        return view('posts.edit', ['post' => $post]);
    }

    public function updatePost(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'posted_by' => ['required',Rule::in($this->creators)],
        ]);

        $request_data=$request->all();
        $post = Post::find($id);
        $post->title = $request_data['title'];
        $post->description = $request_data['description'];
        $post->posted_by = $request_data['posted_by'];
        $post->update();
        return redirect('/');
    }
}
