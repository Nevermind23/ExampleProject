<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        $posts = $user->posts()->with('comments')->paginate(24);
        return view('profile', compact('user', 'posts'));
    }
}
