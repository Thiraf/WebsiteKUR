<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'bank_id' => '6d3a9e77-c138-4686-ae59-e4a1d2955626',
            'created_at' => '2022-01-26 00:00:08',
            'deleted_at' => NULL,
            // 'district_id' => NULL,
            'email' => 'adi.widinanto@bankbsi.co.id',
            'email_verified_at' => NULL,
            'financial_institution_umi_id' => NULL,
            'id' => '05f9040e-7713-4cb9-b635-d5509125a763',
            'name' => 'Adi Widinanto Wardhana',
            'password' => '$2y$10$H0zbaVVukR9hf6KLLsdtd.aRoaflvfC.ZXpDnPkP5oNMZu8mlUSz2',
            'phone' => '085712102701',
            'photo' => NULL,
            'regency_id' => NULL,
            'remember_token' => NULL,
            'role_id' => 2,
            'updated_at' => '2022-01-26 00:33:56',
        ]);



    }
}
