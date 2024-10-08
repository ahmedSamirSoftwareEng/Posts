@extends('layouts.app')

@section('content')
    <h2 class="text-center">Create Post</h2>
    <div class="container w-50">
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
            {{-- post title --}}
            <div class="form-group m-2">
                <label for="formGroupExampleInput"> Post Title</label>
                <input type="text" class="form-control" name="title" value="{{ old('title') }}" id="formGroupExampleInput"
                    placeholder="Post Title">
            </div>
            {{-- post body --}}
            <div class="form-group m-2">
                <label for="formGroupExampleInput2">Post Body</label>
                <input type="text" class="form-control" name ="description" value="{{ old('description') }}"
                    id="formGroupExampleInput2" placeholder="Post Body">
            </div>
            {{-- image --}}
            <div class="form-group m-2">
                <label for="formGroupExampleInput2">Image</label>
                <input type="file" class="form-control" name="image" id="formGroupExampleInput2">
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
