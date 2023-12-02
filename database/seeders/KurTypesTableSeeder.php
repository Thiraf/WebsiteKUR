<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KurType;

class KurTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        KurType::create([
            'id' => '28fba4b1-6ab2-4174-9927-c76058d74ac2',
            'name' => 'Kur Mikro',
            'min_value' => 10000001,
            'max_value' => 50000000,
            'created_at' => '2019-08-13 11:22:09',
            'updated_at' => '2019-08-13 11:22:09',
            'deleted_at' => NULL,
        ]);
        KurType::create([
            'id' => '28fba4b1-6ab2-4174-9927-c76058d74ac2',
            'name' => 'Kur Super Mikro',
            'min_value' => 1000000,
            'max_value' => 500000,
            'created_at' => '2019-08-13 11:22:09',
            'updated_at' => '2019-08-13 11:22:09',
            'deleted_at' => NULL,
        ]);
        KurType::create([
            'id' => '28fba4b1-6ab2-4174-9927-c76058d74ac2',
            'name' => 'Kur Kecil',
            'min_value' => 10000001,
            'max_value' => 50000000,
            'created_at' => '2019-08-13 11:22:09',
            'updated_at' => '2019-08-13 11:22:09',
            'deleted_at' => NULL,
        ]);

    }

}
