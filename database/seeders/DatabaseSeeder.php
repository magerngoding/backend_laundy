<?php

namespace Database\Seeders;

use App\Models\Laundry;
use App\Models\Promo;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // EKSEKUSI DUMMY SEEDER YANG TELAH DIBUAT DISINI :
        $this->call([
            ShopSeeder::class,
            PromoSeeder::class,
            UserSeeder::class,
            LaundrySeeder::class,
        ]);
    }
}
