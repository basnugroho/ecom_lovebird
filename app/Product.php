<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'image', 'price', 'category_id', 'description', 'stock', 'weight'];

    public function category()
	{
		return $this->belongsTo('App\Category');
    }
    
    public function orders() {
        return $this->belongsToMany('App\Order');
    }
	
}
