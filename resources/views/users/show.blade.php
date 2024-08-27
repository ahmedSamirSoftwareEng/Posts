@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                User Info
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-evenly">
                    <h5 class="card-title "> user name : {{ $user->name }}</h5>
                    <p class="card-text"> user email : {{ $user->email }}</p>
                </div>

            </div>


        </div>

    </div>
    {{-- posts --}}
    <div class="container mt-5">
        <div class="card text-center">
            <div class="card-header">
                My Posts
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-evenly">
                    <table class="table">
                        <tr>
                            <th scope="col">post title</th>
                            <th scope="col">post body</th>
                            <th scope="col">image</th>
                        </tr>

                        @foreach ($user->posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->description }}</td>
                                <td><img src="{{ asset('posts_images/images/' . $post->image) }}" width="100px" alt=""></td>
                            </tr>
                        @endforeach
                    </table>


                </div>

            </div>


        </div>

    </div>

@endsection
