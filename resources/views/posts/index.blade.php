@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-center">All Posts</h1>
    <div class="text-center">

        <a class=" btn btn-success btn-lg text-white text-decoration-none m-3"
         href="{{ route('posts.create') }}">Create Post</a>

    </div>
    <div class="container">
        {{-- table of all posts --}}
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">created by</th>
                    <th scope="col">created at</th>
                    <th scope="col">Slug</th>
                    <th scope="col">trashed</th>
                    @auth
                    <th scope="col">Actions</th>

                    @endauth
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td><img src="{{ asset('posts_images/images/' . $post->image) }}" width="100px" alt=""></td>
                        <td>{{ $post->user? $post->user->name : 'No-user' }}</td>
                        <td>{{ $post->created_at->format('Y-m-d') }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>
                            @if ($post->trashed())
                                <form action="{{ route('posts.restore', $post->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm"
                                    onclick="return confirm('Are you sure you want to restore this post?')">Restore</button>
                                </form>

                            @endif
                        </td>

                        <td >
                            @auth

                            <div class="d-flex justify-content-start gap-2">


                            {{-- show post --}}

                           <div class="div">
                            <a class=" btn btn-primary text-white text-decoration-none"
                            href="{{ route('posts.show', $post['id']) }}">view</a>
                           </div>


                            {{-- edit post --}}

                           <div class="div">
                            <a class=" btn btn-success text-white text-decoration-none"
                            href="{{ route('posts.edit', $post['id']) }}">edit</a>
                           </div>


                            {{-- delete post --}}

                            <form action="{{route("posts.destroy",$post) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirmDelete()" class=" btn btn-danger text-white text-decoration-none">delete</button>
                            </form>

                        </div>

                        @endauth
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Pagination links --}}

            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
    </div>

@endsection


<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this post?');
    }
</script>
