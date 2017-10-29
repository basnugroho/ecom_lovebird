<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Address extends Model
{
    protected $fillable = ['street', 'city', 'city_type', 'zip', 'province', 'country', 'phone', 'user_id'];
    
    public function user () {
        return $this->belongsTo('App\User');
    }
}
