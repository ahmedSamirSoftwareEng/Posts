@extends('layouts.app')

@section('content')
    <h1 class="text-center">All Posts</h1>
    <div class="text-center">

        <a class=" btn btn-success btn-lg text-white text-decoration-none m-3"
         href="{{ route('createPost') }}">Create Post </a>

    </div>
    <div class="container">
        {{-- table of all posts --}}
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">created by</th>
                    <th scope="col">created at</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post['id'] }}</th>
                        <td>{{ $post['title'] }}</td>
                        <td>{{ $post['posted_by'] }}</td>
                        <td>{{ $post['created_at'] }}</td>
                        <td>
                            {{-- show post --}}

                            <a class=" btn btn-primary text-white text-decoration-none"
                                href="{{ route('showPost', $post['id']) }}">view</a>


                            {{-- edit post --}}

                            <a class=" btn btn-success text-white text-decoration-none"
                                href="{{ route('editPost', $post['id']) }}">edit</a>


                            {{-- delete post --}}
                            <button class="btn btn-danger">
                                delete
                            </button>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
