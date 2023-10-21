<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BusinessType;
use App\Models\District;
use App\Models\Province;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(BanksTableSeeder::class);
        $this->call(BusinessTypeSeeder::class);
        $this->call(DistrictsTableSeeder::class);
        $this->call(KurTypesTableSeeder::class);
        $this->call(PageTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(TerminsTableSeeder::class);
        $this->call(TestimonialTableSeeder::class);
        $this->call(UserPostalCodes::class);
        $this->call(UsersTableSeeder::class);



    }
}
