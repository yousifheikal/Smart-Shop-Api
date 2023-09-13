<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Database\Seeders\CartSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ReviewSeeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\ProductSeeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\ContactUsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(50)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(CartSeeder::class);
        $this->call(WishlistSeeder::class);
        $this->call(ContactUsSeeder::class);
    }
}
