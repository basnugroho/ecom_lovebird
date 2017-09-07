<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['jalan', 'kecamatan', 'kota', 'provinsi', 'telepon', 'user_id'];
    public function user () {
        return $this->belongsTo('App\User');
    }
}
