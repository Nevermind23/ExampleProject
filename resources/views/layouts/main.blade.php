<html>
<head>
    <title>{{$title}}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">
        <i class="fab fa-laravel"></i> Laravel
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item {{(substr(request()->route()->getName(), 0, strlen('post'))) === 'post' ? 'active' : ''}}">
                <a class="nav-link" href="{{route('post.index')}}">Posts</a>
            </li>
            <li class="nav-item {{(substr(request()->route()->getName(), 0, strlen('conversation'))) === 'conversation' ? 'active' : ''}}">
                <a class="nav-link" href="{{route('conversation.index')}}">Messages</a>
            </li>
            <li class="nav-item {{(substr(request()->route()->getName(), 0, strlen('favourite'))) === 'favourite' ? 'active' : ''}}">
                <a class="nav-link" href="#">Favourites</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container pt-4">
    @yield('content')
</div>
<footer class="footer py-3">
    <div class="container">
        <span class="text-muted">&copy; 2019</span>
    </div>
</footer>
<script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js"
        integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="/js/main.js"></script>
</body>
</html>