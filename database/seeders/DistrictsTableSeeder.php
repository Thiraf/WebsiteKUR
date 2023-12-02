<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\District;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        District::truncate();

        District::create([
            'id' => '1101010',
            'regency_id' => '1101',
            'name' => 'TEUPAH SELATAN',
        ]);

        District::create([
            'id' => '1101020',
            'regency_id' => '1101',
            'name' => 'SIMEULUE TIMUR',
        ]);

        District::create([
            'id' => '1101021',
            'regency_id' => '1101',
            'name' => 'TEUPAH BARAT',
        ]);

        District::create([
            'id' => '1101022',
            'regency_id' => '1101',
            'name' => 'TEUPAH TENGAH',
        ]);

        District::create([
            'id' => '1101030',
            'regency_id' => '1101',
            'name' => 'SIMEULUE TENGAH',
        ]);

        District::create([
            'id' => '1101031',
            'regency_id' => '1101',
            'name' => 'TELUK DALAM',
        ]);


    }
}
