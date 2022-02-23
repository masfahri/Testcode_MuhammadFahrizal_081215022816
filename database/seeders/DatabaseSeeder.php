<?php

namespace Database\Seeders;

use CreateAcaraModelsTable;
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
        // User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
        $this->call(MejaSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(ItemKategoriSeeder::class);

    }
}
