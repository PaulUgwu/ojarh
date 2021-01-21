<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    protected $fillable = ['name','slug','child_category_id', 'status'];


    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    
}
