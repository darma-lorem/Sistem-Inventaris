<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
	protected $table ='kategoris';
    protected $fillable = [
    	'name',
    	'kode_kategori',
    ];

    public function product()
    {
    	return $this->hasMany('App\Product');
    }

    public function ambilproduct()
    {
    	return $this->hasMany('App\AmbilProduct');
    }
}
