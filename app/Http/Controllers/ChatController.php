<?php

namespace App\Http\Controllers;

use App\Chat;
use App\ChatReply;
use App\Helpers\ChatHelper;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ChatController extends Controller
{
    public function new_chat(Request $request)
    {

        $request->validate([
            'customer_email'        => ['bail', 'required'],
            'customer_full_name'    => ['bail', 'required'],
            'customer_phone_number' => ['bail', 'required'],
            'user_id'               => ['bail', 'required'],
            'customer_address'      => ['bail', 'required'],
            'request_title'         => ['bail', 'required', 'string'],
            'message'               => ['bail', 'required'],
            'product_id'            => ['bail', 'required'],
        ]);

        $new_chat = ChatHelper::new_chat($request);

        return response()->json($new_chat);

    }

    public function chat_replies(Request $request)
    {
        $request->validate([
            'chat_id' => ['bail', 'required'],
        ]);

        $chat_replies = ChatHelper::chat_replies($request->chat_id);

        return response()->json($chat_replies);

    }

    public function reply(Request $request)
    {
        $request->validate([
            'chat_id' => ['bail', 'required'],
            'message' => ['bail', 'required'],
        ]);

        $chat = Chat::find($request->chat_id);

        $reply = ChatHelper::new_reply($request->chat_id, $request->message, $chat->customer_full_name);

        return response()->json($reply);
        
    }

    public function continue(Request $request)
    {
        $request->validate([
            'chat_id'         => ['bail', 'required'],
            // 'manufacturer_id' => ['bail', 'required'],
        ]);

        $chat = Chat::find($request->chat_id);

        if($chat->manufacturer_id != $request->manufacturer_id){
            throw ValidationException::withMessages([
                'chat_id' => ['invalid chat id.'],
            ]);
        }

        if($chat) {
            return $chat->id;
        }

        return null;
        
    }
}
