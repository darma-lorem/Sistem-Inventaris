<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class AmbilProduct extends Model
{
	protected $table = 'ambilproducts';
	protected $fillable = [
		'id_product',
		'jenis_transaksi_product',
		'jumlah_product',
		'tanggal_pengambilan',
		'detail_penggunaan_product',
		'created_by',
		'updated_by'
	];

	public function getNameProduct(){
		return $this->hasOne(Product::class, 'id', 'id_product');
	}

	public function getCreatedBy()
	{
		return $this->hasOne(User::class, 'id', 'created_by');
	}
	public function getUpdatedBy()
	{
		return $this->hasOne(User::class, 'id', 'updated_by');
	}
}