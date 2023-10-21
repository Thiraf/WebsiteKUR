<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Role::create([
            'id' => '0',
            'name' => 'Admin OJK',
            'created_at' => '2019-08-13 11:22:09',
            'updated_at' => '2019-08-13 11:22:09',
            'deleted_at' => NULL,
        ]);
        Role::create([
            'id' => '1',
            'name' => 'Admin Bank',
            'created_at' => '2019-08-13 11:22:09',
            'updated_at' => '2019-08-13 11:22:09',
            'deleted_at' => NULL,
        ]);
        Role::create([
            'id' => '2',
            'name' => 'Sub Admin Bank',
            'created_at' => '2019-08-13 11:22:09',
            'updated_at' => '2019-08-13 11:22:09',
            'deleted_at' => NULL,
        ]);
        Role::create([
            'id' => '3',
            'name' => 'Pengawas',
            'created_at' => '2019-08-13 11:22:09',
            'updated_at' => '2019-08-13 11:22:09',
            'deleted_at' => NULL,
        ]);


    }
}
