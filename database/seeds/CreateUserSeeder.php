<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
        	'name' => 'Dharma',
        	'last_name' => 'Putra',
        	'email' => 'admin@test.com',
            'jabatan' => 'admin',
        	'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('admin');

        $operasional = User::create([
        	'name' => 'Agus',
        	'last_name' => 'Arya',
        	'email' => 'agus@test.com',
            'jabatan' => 'inventaris',
        	'password' => bcrypt('12345678'),
        ]);

        $operasional->assignRole('user');

        $inventaris = User::create([
        	'name' => 'Riska',
        	'last_name' => 'Dewi',
        	'email' => 'riska@test.com',
            'jabatan' => 'operasional',
        	'password' => bcrypt('12345678'),
        ]);

        $inventaris->assignRole('user');
    }
}
