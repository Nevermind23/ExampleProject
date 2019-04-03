<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderByDesc('created_at')->paginate(24);
        return $posts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //TODO implement views
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $user = auth()->user();
        $post = $user->posts()->create($request->validated());

        return redirect(route('post.show', [$post->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @param null $slug
     * @return Post
     */
    public function show(Post $post, $slug = null)
    {
        if($slug != Str::slug($post->name)) {
            return redirect(route('post.show', [$post->id, Str::slug($post->name)]));
        }
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return void
     */
    public function edit(Post $post)
    {
        //TODO implement views
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostRequest $request
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->validated());
        return redirect(route('post.show', [$post->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(route('post.index'));
    }
}
