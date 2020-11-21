<?php

use Illuminate\Database\Seeder;
use App\Satuan;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Satuan::create([
        	'name' => 'Pieces',
        	'kode_satuan' => 'pcs'
        ]);

        Satuan::create([
        	'name' => 'Box',
        	'kode_satuan' => 'Box'
        ]);
    }
}
