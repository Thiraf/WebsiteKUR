<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Termin;

class TerminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Termin::truncate(); // Menghapus semua data dari tabel Termin

        Termin::create([
            'id' => '26dec68a-f0df-4f1c-b041-5c8d378ff971',
            'name' => '5 TAHUN',
            'value' => 60,
            'created_at' => '2019-08-13 11:22:15',
            'updated_at' => '2019-08-13 11:22:15',
            'deleted_at' => null,
        ]);

        Termin::create([
            'id' => '26dec68a-f0df-4f1c-b041-5c8d378ff971',
            'name' => '50 TAHUN',
            'value' => 60,
            'created_at' => '2019-08-13 11:22:15',
            'updated_at' => '2019-08-13 11:22:15',
            'deleted_at' => null,
        ]);
    }
}
