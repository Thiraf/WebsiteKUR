<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BusinessType;

class BusinessTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        BusinessType::truncate();

        BusinessType::create([
            'id' => '7b10bd70-a97a-4aec-9ace-891a69b004f0',
            'name' => 'Ternak LELE',
            'created_at' => '2019-08-13 11:22:09',
            'updated_at' => '2019-08-13 11:22:09',
        ]);

        BusinessType::create([
            'id' => '7b10bd70-a97a-4aec-9ace-891a69b004f0',
            'name' => 'Ternak LELE Ayam',
            'created_at' => '2019-08-13 11:22:09',
            'updated_at' => '2019-08-13 11:22:09',
        ]);



    }
}
