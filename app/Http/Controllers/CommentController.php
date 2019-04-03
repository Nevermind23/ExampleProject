<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * @param Post $post
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index(Post $post)
    {
        $comments = $post->comments()->paginate(24);
        return $comments;
    }

    /**
     * @param CommentRequest $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CommentRequest $request, Post $post)
    {
        $user = auth()->user();
        $data = $request->validated();
        $data['user_id'] = $user->id;

        $post->comments()->create($data);
        return redirect(route('post.show', [$post->id]));
    }

    /**
     * @param CommentRequest $request
     * @param Comment $comment
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(CommentRequest $request, Comment $comment)
    {
        $comment->update($request->validated());
        return redirect(route('post.show', [$comment->post_id]));
    }

    /**
     * @param Comment $comment
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Comment $comment)
    {
        $postId = $comment->post_id;
        $comment->delete();

        return redirect(route('post.show', [$postId]));
    }
}
