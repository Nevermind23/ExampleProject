@extends('layouts.main', ['title' => $user->name.' - Profile'])

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="w-100">
                    <img src="{{$user->avatar}}" height="100px"
                         class="rounded float-left"
                         alt="{{$user->name}}">
                    <h5>
                        {{$user->name}}
                        @if(auth()->user()->id != $user->id)
                            <a href="{{route('conversation.create', [$user->id])}}">
                                <span class="badge badge-primary badge-lg">
                                    <i class="fas fa-comment-dots"></i>
                                </span>
                            </a>
                        @endif
                    </h5>
                </div>
                <div class="float-right">
                    <div class="badge badge-secondary">
                        <i class="fas fa-newspaper"></i> {{$user->posts->count()}}
                    </div>

                </div>

            </div>
        </div>
    </div>

    @foreach($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="w-100">
                        <img src="{{$post->user->avatar}}" height="50px"
                             class="rounded-circle float-left"
                             alt="{{$post->user->name}}">
                        <h5 class="mb-1">{{$post->user->name}}</h5>
                        <small>{{$post->created_at->diffForHumans()}}</small>
                    </div>
                    <div>
                        <span class="badge badge-secondary" style="height: 20px!important;">
                        <i class="fas fa-comment"></i> {{$post->comments->count()}}
                    </span>
                    </div>
                </div>
                <p class="pt-3">
                    {{\Illuminate\Support\Str::limit($post->text, 500, '...')}}
                </p>
                <a href="{{route('post.show', [$post->id])}}" class="btn btn-success float-right">Read More</a>
            </div>
        </div>
    @endforeach
@endsection