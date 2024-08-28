@extends('layouts.app')

@section('content')
<h2 class="text-center">Edit Post</h2>
<div class="container w-50">
    <form method="POST" action="{{ route('posts.update', $post) }} " enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        {{-- post title --}}
        <div class="form-group m-2">
          <label for="formGroupExampleInput"> Post Title</label>
          <input type="text" class="form-control"
          name="title" id="formGroupExampleInput" value="{{ $post['title']?:old('title') }}">
        </div>
        {{-- post body --}}
        <div class="form-group m-2">
          <label for="formGroupExampleInput2">Post Body</label>
          <input type="text" class="form-control" name ="description"
          id="formGroupExampleInput2" value="{{ $post['description']?: old('description') }}">
        </div>
        {{-- image --}}
        <img src="{{ asset('posts_images/images/' . $post->image) }}" width="100px" alt="">
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
