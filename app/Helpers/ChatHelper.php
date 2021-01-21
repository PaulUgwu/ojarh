<?php

namespace App\Helpers;

use App\Admin;
use App\Chat;
use App\Mail\NewChatNitification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ChatHelper {

    static public function new_chat($request) {

        $chat = new Chat();

        $chat->customer_email        = $request->customer_email;
        $chat->customer_full_name    = $request->customer_full_name;
        $chat->customer_phone_number = $request->customer_phone_number;
        $chat->user_id               = $request->user_id;
        $chat->customer_address      = $request->customer_address;
        $chat->request_title         = $request->request_title;
        $chat->product_id            = $request->product_id;
        $result                      = $chat->save();
        
        if($result) {
            // Mail::to($chat->customer_email)->send(new NewChatNitification($chat));
            self::new_reply($chat->id, $request->message, $request->customer_full_name );
            return $chat->id;
        }

        return null;
        
    }

    static public function new_reply($chat_id, $chat_message, $replyer, $admin_id = null) {

        

        $chat = Chat::findOrFail($chat_id);

        if($chat) {

            $replies = $chat->chat_replies()->create([
                'message'      => $chat_message,
                'replyer_name' => $replyer,
                'admin_id'     => $admin_id,
            ]);
            
            $chat->update([]);

            return $replies;

        }

    }


    static public function chat_replies($chat_id) {

        $chat = Chat::findOrFail($chat_id);

        if($chat) {

            $replies = $chat->chat_replies()->orderBy('created_at', 'desc')->get();
            return $replies;

        }

        return null;

    }

}