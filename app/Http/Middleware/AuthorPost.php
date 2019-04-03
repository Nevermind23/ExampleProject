<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;

class AuthorPost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();
        $post = $request->route('post');
        if($user->id == $post->user->id) {
            return $next($request);
        }

        return abort(403, 'You are not able to access this page');
    }
}
