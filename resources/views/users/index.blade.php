@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-center">All users</h1>
    <div class="text-center">

        <a class=" btn btn-success btn-lg text-white text-decoration-none m-3"
         href="{{ route('users.create') }}">Add User</a>

    </div>
    <div class="container">
        {{-- table of all posts --}}
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">Actions</th>

            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                {{-- show post --}}

                            <a class=" btn btn-primary text-white text-decoration-none"
                            href="{{ route('users.show', $user) }}">view</a>


                        {{-- edit post --}}

                        <a class=" btn btn-success text-white text-decoration-none"
                            href="{{ route('users.edit', $user) }}">edit</a>


                        {{-- delete post --}}

                        <form action="{{route("users.destroy",$user) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class=" btn btn-danger text-white text-decoration-none">delete</button>
                        </form>

                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Pagination links --}}

        <div class="d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>
@endsection
