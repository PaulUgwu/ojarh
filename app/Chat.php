<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_email', 'customer_full_name', 'customer_phone_number', 'manufacturer_id', 'request_title', 'product_id'
    ];
    
    /**
     * Get the replies for the chat.
     */
    public function chat_replies()
    {
        return $this->hasMany('App\ChatReply');
    }

    /**
     * Get the manufacturer that own the chat.
     */
    public function manufacturer()
    {
        return $this->belongsTo('App\Manufacturer');
    }

    /**
     * Get the product that own the chat.
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    /**
     * Get the manufacturer request that own the chat.
     */
    // public function has_request()
    // {
    //     if(ManufacturerRequest::where('chat_id', $this->id)->first())
    //     {
    //         return ManufacturerRequest::where('chat_id', $this->id)->first();
    //     }

    //     return false;

    // }
}
