@extends('layouts.main', ['title' => 'Simple Social Network'])

@section('content')
    @include('layouts.alerts')
    <form class="form-group" action="{{route('post.store')}}" method="post">
        @csrf
        <textarea class="form-control" placeholder="Wanna say something ?" name="text" rows="4"></textarea>
        <div class="pt-1">
            <button type="submit" class="btn btn-primary">Post</button>
        </div>
    </form>
    @foreach($posts as $post)
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
                    {{\Illuminate\Support\Str::limit($post->text, 500, '...')}}
                </p>
                <a href="{{route('post.show', [$post->id])}}" class="btn btn-success float-right">Read More</a>
            </div>
        </div>
    @endforeach
@endsection