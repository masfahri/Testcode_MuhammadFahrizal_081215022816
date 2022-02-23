<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name' => 'Admin DWedding',
            'email' => 'admin@dwedding.id',
            'password' => bcrypt('asdasdasd')
        ]);

        $user1->assignRole('manajer');

        $user2 = User::create([
            'name' => 'Pelayan DWedding',
            'email' => 'pelayan@dwedding.id',
            'password' => bcrypt('asdasdasd')
        ]);

        $user2->assignRole('pelayan');

        $user3 = User::create([
            'name' => 'Kasir DWedding',
            'email' => 'kasir@dwedding.id',
            'password' => bcrypt('asdasdasd')
        ]);

        $user3->assignRole('kasir');
    }
}
