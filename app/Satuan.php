<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
	protected $table = 'satuans';
    protected $fillable = [
    	'name',
    	'kode_satuan',
    ];

    public function product()
    {
    	return $this->hasMany('App\Product');
    }

    public function ambilproducct()
    {
    	return $this->hasMany('App\AmbilProduct');
    }
}
