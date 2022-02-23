<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create([
            'kode_item' => 'ITM-0001',
            'nama'      => 'Nasi Goreng Jawa',
            'harga'     => 20000,
        ]);
        Item::create([
            'kode_item' => 'ITM-0002',
            'nama'      => 'Nasi Goreng Sumatera',
            'harga'     => 25000,
        ]);
        Item::create([
            'kode_item' => 'ITM-0003',
            'nama'      => 'Es Teh Manis',
            'harga'     => 7000,
        ]);
        Item::create([
            'kode_item' => 'ITM-0004',
            'nama'      => 'Thaitea',
            'harga'     => 15000,
        ]);
    }
}
