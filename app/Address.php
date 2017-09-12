<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['street', 'city', 'zip', 'province', 'country', 'phone', 'user_id'];
    
    public function user () {
        return $this->belongsTo('App\User');
    }
}
