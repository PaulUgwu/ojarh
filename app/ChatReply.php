<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatReply extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'message', 'replyer_name', 'admin_id'
    ];

    /**
     * Get the chat that owns the reply.
     */
    public function chat()
    {
        return $this->belongsTo('App\Chat');
    }
}
