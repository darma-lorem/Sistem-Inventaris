<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class AmbilProduct extends Model
{
	protected $table = 'ambilproducts';
	protected $fillable = [
		'id_product',
		'kode_trans',
		'jenis_transaksi_product',
		'jumlah_product',
		'tanggal_pengambilan',
		'detail_penggunaan_product',
	];

	public function getCode()
	{
        return'TA/'.$this->id_product.'/'.$this->id;
	}

	public function getNameProduct(){
		return $this->belongsTo('App\Product', 'id_product', 'id');
	}

	public function getCreatedBy()
	{
		return $this->belongsTo(User::class, 'created_by', 'id');
	}
	public function getUpdatedBy()
	{
		return $this->belongsTo(User::class, 'updated_by', 'id');
	}
}