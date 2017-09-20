<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'total', 'status', 'delivery_method','delivery_service','delivery_cost', 'receipt'];

    public function products() {
        return $this->belongsToMany('App\Product')
        ->withPivot('quantity', 'selling_price');
    }
}
