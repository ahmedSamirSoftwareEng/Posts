@extends('layouts.app')

@section('content')
<h2 class="text-center">Edit Post</h2>
<div class="container w-50">
    <form method="POST" action="{{ route('posts.update', $post['id']) }}">
        @csrf
        {{-- post title --}}
        <div class="form-group m-2">
          <label for="formGroupExampleInput"> Post Title</label>
          <input type="text" class="form-control" name="title" id="formGroupExampleInput" placeholder="{{ $post['title'] }}">
        </div>
        {{-- post body --}}
        <div class="form-group m-2">
          <label for="formGroupExampleInput2">Post Body</label>
          <input type="text" class="form-control" name ="description" id="formGroupExampleInput2" placeholder="{{ $post['description'] }}">
        </div>
        {{-- posted by --}}
        <div class="form-group m-2">
          <label for="formGroupExampleInput2">Posted By</label>
          <select class="form-control" name="posted_by" id="">
            <option value="Ahmed">Ahmed</option>
            <option value="ali">ali</option>
            <option value="omar">omar</option>
            <option value="hassan">hassan</option>
            <option value="mohamed">mohamed</option>
          </select>
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
