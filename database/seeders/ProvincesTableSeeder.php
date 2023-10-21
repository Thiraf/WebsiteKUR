<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Province;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        // Province::truncate();


        Province::create([
            'id' => '11',
            'name' => 'ACEH',
        ]);

        Province::create([
            'id' => '12',
            'name' => 'SUMATERA UTARA',
        ]);

        Province::create([
            'id' => '13',
            'name' => 'SUMATERA BARAT',
        ]);

        Province::create([
            'id' => '14',
            'name' => 'RIAU',
        ]);

        Province::create([
            'id' => '15',
            'name' => 'JAMBI',
        ]);

        Province::create([
            'id' => '16',
            'name' => 'SUMATERA SELATAN',
        ]);

        Province::create([
            'id' => '17',
            'name' => 'BENGKULU',
        ]);

        Province::create([
            'id' => '18',
            'name' => 'LAMPUNG',
        ]);

        Province::create([
            'id' => '19',
            'name' => 'KEPULAUAN BANGKA BELITUNG',
        ]);

        Province::create([
            'id' => '21',
            'name' => 'KEPULAUAN RIAU',
        ]);

        Province::create([
            'id' => '31',
            'name' => 'DKI JAKARTA',
        ]);

        Province::create([
            'id' => '32',
            'name' => 'JAWA BARAT',
        ]);

        Province::create([
            'id' => '33',
            'name' => 'JAWA TENGAH',
        ]);

        Province::create([
            'id' => '34',
            'name' => 'DI YOGYAKARTA',
        ]);

        Province::create([
            'id' => '35',
            'name' => 'JAWA TIMUR',
        ]);

        Province::create([
            'id' => '36',
            'name' => 'BANTEN',
        ]);

        Province::create([
            'id' => '51',
            'name' => 'BALI',
        ]);

        Province::create([
            'id' => '52',
            'name' => 'NUSA TENGGARA BARAT',
        ]);

        Province::create([
            'id' => '53',
            'name' => 'NUSA TENGGARA TIMUR',
        ]);

        Province::create([
            'id' => '61',
            'name' => 'KALIMANTAN BARAT',
        ]);

        Province::create([
            'id' => '62',
            'name' => 'KALIMANTAN TENGAH',
        ]);

        Province::create([
            'id' => '63',
            'name' => 'KALIMANTAN SELATAN',
        ]);

        Province::create([
            'id' => '64',
            'name' => 'KALIMANTAN TIMUR',
        ]);

        Province::create([
            'id' => '65',
            'name' => 'KALIMANTAN UTARA',
        ]);

        Province::create([
            'id' => '71',
            'name' => 'SULAWESI UTARA',
        ]);

        Province::create([
            'id' => '72',
            'name' => 'SULAWESI TENGAH',
        ]);

        Province::create([
            'id' => '73',
            'name' => 'SULAWESI SELATAN',
        ]);

        Province::create([
            'id' => '74',
            'name' => 'SULAWESI TENGGARA',
        ]);

        Province::create([
            'id' => '75',
            'name' => 'GORONTALO',
        ]);

        Province::create([
            'id' => '76',
            'name' => 'SULAWESI BARAT',
        ]);

        Province::create([
            'id' => '81',
            'name' => 'MALUKU',
        ]);

        Province::create([
            'id' => '82',
            'name' => 'MALUKU UTARA',
        ]);

        Province::create([
            'id' => '91',
            'name' => 'PAPUA BARAT',
        ]);

        Province::create([
            'id' => '94',
            'name' => 'PAPUA',
        ]);








    }
}
