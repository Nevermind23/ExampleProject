@extends('layouts.main', ['title' => $post->user->name . '\'s post - Simple Social Network'])

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="w-100">
                    <a href="{{route('user.show', [$post->user_id])}}">
                        <img src="{{$post->user->avatar}}" height="50px"
                             class="rounded-circle float-left"
                             alt="{{$post->user->name}}">
                    </a>
                    <a href="{{route('user.show', [$post->user_id])}}">
                        <h5 class="mb-1">{{$post->user->name}}</h5>
                    </a>
                    <small>{{$post->created_at->diffForHumans()}}</small>
                </div>
                <div>
                        <span class="badge badge-secondary" style="height: 20px!important;">
                        <i class="fas fa-comment"></i> {{$post->comments->count()}}
                    </span>
                </div>
            </div>
            <p class="pt-3">
                {{nl2br($post->text)}}
            </p>
        </div>
    </div>
    @include('layouts.alerts')
    <form class="form-group pt-2" action="{{route('comment.store', [$post->id])}}" method="post">
        @csrf
        <textarea class="form-control" placeholder="Wanna write comment ?" name="text" rows="4"></textarea>
        <div class="pt-1">
            <button type="submit" class="btn btn-primary">Comment</button>
        </div>
    </form>
    <ul class="list-group">
        @foreach($post->comments as $comment)
            <li class="list-group-item">
                <img src="{{$post->user->avatar}}" height="20px"
                     class="rounded"
                     alt="{{$post->user->name}}">
                <a href="{{route('user.show', [$post->user_id])}}">
                    <b>{{$post->user->name}}</b>
                </a>
                {{$comment->text}}
                <small class="float-right text-muted">
                    {{$comment->created_at->diffForHumans()}}
                </small>
            </li>
        @endforeach
    </ul>
@endsection