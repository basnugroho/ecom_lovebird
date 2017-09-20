<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Product extends Model
{
    protected $table = 'order_product';
    protected $fillable = [
        'order_id', 'product_id', 'selling_price', 'quantity'
    ];

    public function order () {
        $this->belongsTo('App\Order');
    }
    public function product () {
        $this->belongsTo('App\Product');
    }
}
