<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bank;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Bank::truncate();

        Bank::create([
            'code' => '113',
            'created_at' => '2021-12-21 05:29:08',
            'deleted_at' => NULL,
            'id' => 'e6cc23ab-7645-4852-90b8-45884cd8d8c7',
            'link' => 'https://www.bankjateng.co.id/',
            'logo' => 'http://phplaravel-151716-2282619.cloudwaysapps.com/storage/bank/5c7b88493d3348f9ffdf22b70470d9b1_1640064548_300px.jpg',
            'name' => 'Bank Jateng',
            'reason_status' => 'null',
            'status' => 1,
            'updated_at' => '2021-12-21 05:40:33',

        ]);

        Bank::create([
            'code' => '009',
            'created_at' => '2022-01-13 11:57:04',
            'deleted_at' => NULL,
            'id' => 'f2d775d0-8a7b-435a-9b5c-13eb6eec3a97',
            'link' => 'null',
            'logo' => 'https://kurjogja.id/storage/bank/bd2be71625bee054a6d97c2cc5bba089_1642046224_300px.jpg',
            'name' => 'BNI',
            'reason_status' => 'null',
            'status' => 1,
            'updated_at' => '2022-01-13 11:57:04',
        ]);

        Bank::create([
            'code' => 'null',
            'created_at' => '2021-12-21 05:27:30',
            'deleted_at' => '2021-12-21 05:27:36',
            'id' => 'd4d0504c-810d-4a63-8db6-2a3d1fd4caa7',
            'link' => 'null',
            'logo' => 'http://phplaravel-151716-2282619.cloudwaysapps.com/storage/bank/1f5b14e14a921b6fd14dba6f1d35494b_1640064450_300px.jpg',
            'name' => 'Bank Nationalnobu',
            'reason_status' => 'null',
            'status' => 1,
            'updated_at' => '2021-12-21 05:27:36',
        ]);
    }
}
