<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'products';
	protected $fillable = [
		'name',
		'kode_product',
		'id_kategori',
		'jumlah_product',
		'id_satuan',
		'updated_by'
	];

	public function getUpdatedBy()
	{
		return $this->belongsTo(User::class, 'updated_by', 'id');
	}

	public function getKodeSatuan()
	{
		return $this->belongsTo('App\Satuan', 'id_kategori', 'id');
	}

	public function getKodeKategori()
	{
		return $this->belongsTo('App\Kategori', 'id_satuan', 'id');
	}

	public function ambilproduct()
	{
		return $this->hasMany('App\AmbilProduct');
	}
}