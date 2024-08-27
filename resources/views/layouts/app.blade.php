<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light ">
        <a class="navbar-brand" href="#">ITI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">

              <a class="nav-link" href="{{ route('posts.index') }}">AllPosts</a>



          <a class="nav-link" href="{{ route('users.index') }}">AllUsers</a>
            </ul>
        </div>
      </nav>
   </div>

    <div class="container">
        @yield('content')
    </div>

{{-- links --}}

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</body>
</html>
