<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 
        'status', 
        'delivery_method', 
        'delivery_service', 
        'delivery_cost', 
        'weight_total', 
        'delivery_cost_total', 
        'sub_total', 
        'total', 
        'payment_method', 
    ];

    public function products() {
        return $this->belongsToMany('App\Product');
    }

    public function details() {
        return $this->hasMany('App\Order_Product');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
