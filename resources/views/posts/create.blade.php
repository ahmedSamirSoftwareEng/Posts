@extends('layouts.app')

@section('content')
<h2 class="text-center">Create Post</h2>
<div class="container w-50">
    <form>
        {{-- post title --}}
        <div class="form-group m-2">
          <label for="formGroupExampleInput"> Post Title</label>
          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Post Title">
        </div>
        {{-- post body --}}
        <div class="form-group m-2">
          <label for="formGroupExampleInput2">Post Body</label>
          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Post Body">
        </div>
        {{-- posted by --}}
        <div class="form-group m-2">
          <label for="formGroupExampleInput2">Posted By</label>
          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Posted By">
        </div>
        {{-- submit button --}}
        <button type="submit" class="btn btn-primary m-2">Submit</button>
      </form>
</div>
@endsection
