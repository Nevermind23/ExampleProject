<?php

namespace App\Http\Middleware;

use Closure;

class AuthorComment
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
        $comment = $request->route('comment');
        
        if($user->id == $comment->user_id) {
            return $next($request);
        }

        return abort(403, 'You are not able to access this page');
    }
}
