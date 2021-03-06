<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(CreateUserSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(SatuanSeeder::class);
    }
}
