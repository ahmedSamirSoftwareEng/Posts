@extends('layouts.app')

@section('content')
<h2 class="text-center">Edit Post</h2>
<div class="container w-50">
    <form>
        {{-- post title --}}
        <div class="form-group m-2">
          <label for="formGroupExampleInput"> Post Title</label>
          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="{{ $post['title'] }}">
        </div>
        {{-- post body --}}
        <div class="form-group m-2">
          <label for="formGroupExampleInput2">Post Body</label>
          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="{{ $post['description'] }}">
        </div>
        {{-- posted by --}}
        <div class="form-group m-2">
          <label for="formGroupExampleInput2">Posted By</label>
          <select class="form-control" name="" id="">
            <option value="">{{ $post['posted_by'] }}</option>
            <option value="Ahmed">ali</option>
            <option value="Ahmed">omar</option>
          </select>
        </div>
        {{-- submit button --}}
        <button type="submit" class="btn btn-primary m-2">Submit</button>
      </form>
</div>
@endsection
