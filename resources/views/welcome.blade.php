@extends('layouts.main', ['title' => 'Welcome Page'])

@section('content')
    <div class="jumbotron">
        <p>
            A simple social network example, with Posts, comments and messages.
        </p>
        <div class="text-center pt-50">
            <a href="{{route('login')}}" class="btn btn-success btn-lg">
                Login
            </a>
            <a href="{{route('register')}}" class="btn btn-info btn-lg">
                Register
            </a>
        </div>
    </div>
@endsection