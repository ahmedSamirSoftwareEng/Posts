@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card text-center">
        <div class="card-header">
          Post Info
        </div>
        <div class="card-body">
          <h5 class="card-title"> post title : {{ $post['title'] }}</h5>
          <p class="card-text"> post body : {{ $post['description'] }}</p>
          <p class="card-text"> posted by : {{ $post['posted_by'] }}</p>
        </div>
      </div>
</div>

@endsection
