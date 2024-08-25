<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class postController extends Controller
{
    private $posts = [
        [
            'id' => 1,
            'title' => 'Post One',
            'posted_by' => 'Ahmed',
            'created_at' => '2021-01-01',
            'description' => 'this is post one description',
        ],
        [
            'id' => 2,
            'title' => 'Post Two',
            'posted_by' => 'ali',
            'created_at' => '2021-05-04',
            'description' => 'this is post two description',
        ],
        [
            'id' => 3,
            'title' => 'Post Three',
            'posted_by' => 'omar',
            'created_at' => '2021-05-01',
            'description' => 'this is post three description',
        ],
    ];
    public function index()
    {
        return view('posts.index', ['posts' => $this->posts]);
    }

    public function showPost($id)
    {
        $post = $this->posts[$id - 1];
        return view('posts.show', ['post' => $post]);
    }
    public function createPost(){
        return view('posts.create');
    }

    public function editPost($id)
    {
        $post = $this->posts[$id - 1];
        return view('posts.edit', ['post' => $post]);
    }

}
