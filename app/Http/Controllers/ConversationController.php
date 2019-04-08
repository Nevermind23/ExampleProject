<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\Conversation;
use App\Models\User;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $conversations = $user->conversations;

        return view('conversation.index', compact('conversations'));
    }

    public function messages(Conversation $conversation)
    {
        $messages = $conversation->messages()->orderByDesc('updated_at')->paginate(24);
        return view('conversation.messages', compact('conversation', 'messages'));
    }

    public function sendMessage(MessageRequest $request, Conversation $conversation)
    {
        $user = auth()->user();
        $data = $request->validated();
        $data['user_id'] = $user->id;

        $conversation->messages()->create($data);

        return redirect(route('conversation.messages', [$conversation->id]));
    }

    public function create(User $user)
    {
        $authUser = auth()->user();
        $conversation = $authUser->conversations()->where('user_1_id', $user->id)->orWhere('user_2_id', $user->id)->first();

        if(empty($conversation)) {
            $conversation = $authUser->conversations()->create(['user_2_id' => $user->id]);
        }


        return redirect(route('conversation.messages', [$conversation->id]));
    }
}
