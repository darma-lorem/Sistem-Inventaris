<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'products';
	protected $fillable = [
		'name',
		'kategori',
		'jumlah_product',
		'satuan',
		'tanggal_masuk',
		'updated_by'
	];

	public function getUpdatedBy()
	{
		return $this->hasOne(User::class, 'id','updated_by');
	}
	public function getNameKategori()
	{
		return $this->hasOne(Kategori::class, 'id', 'name');
	}
}