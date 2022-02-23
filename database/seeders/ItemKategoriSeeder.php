<?php

namespace Database\Seeders;

use App\Models\ItemKategori;
use Illuminate\Database\Seeder;

class ItemKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ItemKategori::create([
            'kategori_id' => 1,
            'kode_item'   => 'ITM-0001'
        ]);

        ItemKategori::create([
            'kategori_id' => 1,
            'kode_item'   => 'ITM-0002'
        ]);

        ItemKategori::create([
            'kategori_id' => 2,
            'kode_item'   => 'ITM-0003'
        ]);

        ItemKategori::create([
            'kategori_id' => 2,
            'kode_item'   => 'ITM-0004'
        ]);
    }
}
