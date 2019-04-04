<?php

namespace App\Http\Middleware;

use Closure;

class AuthorConversation
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
        $conversation = $request->route('conversation');

        $exists = $user->conversations()->where('id', $conversation->id)->exists();

        if($exists) {
            return $next($request);
        }

        return abort(403, 'You are not able to access this page');
    }
}
