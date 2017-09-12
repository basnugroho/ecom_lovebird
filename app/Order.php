<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['total', 'status', 'delivery_id','receipt'];

    public function expedition () {
        return $this->belongsTo('App\Expedition');
    }

    public function products() {
        return $this->belongsToMany('App\Product');
    }
}
