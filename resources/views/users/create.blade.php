@extends('layouts.app')

@section('content')
    <h2 class="text-center">Add User</h2>
    <div class="container w-50">
        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
            @csrf
            {{-- user name --}}
            <div class="form-group m-2">
                <label for="formGroupExampleInput"> user name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                 id="formGroupExampleInput"placeholder="Post Title">
            </div>
            {{-- user email --}}
            <div class="form-group m-2">
                <label for="formGroupExampleInput2">user email</label>
                <input type="text" class="form-control" name ="email" value="{{ old('email') }}"
                    id="formGroupExampleInput2" placeholder="userEmail">
            </div>
            {{-- user password --}}
            <div class="form-group m-2">
                <label for="formGroupExampleInput2">user password</label>
                <input type="password" class="form-control" name ="password" id="formGroupExampleInput2"
                    placeholder="user password">
            </div>
            {{-- confirm password --}}
            <div class="form-group m-2">
                <label for="formGroupExampleInput2">confirm password</label>
                <input type="password" class="form-control" name ="password_confirmation" id="formGroupExampleInput2"
                    placeholder="confirm password">
            </div>

            {{-- error --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- submit button --}}
            <button type="submit" class="btn btn-primary m-2">Submit</button>
        </form>
    </div>
@endsection
