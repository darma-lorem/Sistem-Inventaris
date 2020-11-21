<?php

use Illuminate\Database\Seeder;
use App\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
        	'name' => 'Alat Tulis Kantor',
            'kode_kategori' => 'ATK'
        ]);

        Kategori::create([
        	'name' => 'Sovenir',
            'kode_kategori' => 'SV'
        ]);
    }
}
