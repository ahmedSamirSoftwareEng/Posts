@extends('layouts.app')

@section('content')
    <h2 class="text-center">Edit User</h2>
    <div class="container w-50">
        <form method="POST" action="{{ route('users.update', $user) }}">
            @csrf
            @method('PUT')

            {{-- User Name --}}
            <div class="form-group m-2">
                <label for="name">User Name</label>
                <input type="text" class="form-control" name="name" id="name"
                    value="{{ old('name', $user->name) }}">
            </div>

            {{-- User Email --}}
            <div class="form-group m-2">
                <label for="email">User Email</label>
                <input type="email" class="form-control" name="email" id="email"
                    value="{{ old('email', $user->email) }}">
            </div>

            {{-- Password --}}
            <div class="form-group m-2">
                <label for="password">New Password</label>
                {{-- password hidden --}}
                <input type="hidden" name="old_password" value="{{ $user->password }}">
                <input type="password" class="form-control" name="password" id="password">
                <small class="form-text text-muted">Leave blank if you do not want to change the password.</small>
            </div>

            {{-- Error Messages --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Submit Button --}}
            <button type="submit" class="btn btn-primary m-2">Submit</button>
        </form>
    </div>
@endsection
