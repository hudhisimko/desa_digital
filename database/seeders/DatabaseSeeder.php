<?php

namespace Database\Seeders;

use App\Models\User;
<<<<<<< HEAD
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
=======
use Illuminate\Database\Seeder;
use Database\Seeders\SocialAssistanceSeeder;
>>>>>>> 851a6ebf494b04cd710262de18112042ddbb9bfb

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
        // User::factory(10)->create();

        //User::factory()->create([
        //    'name' => 'Test User',
        //    'email' => 'test@example.com',
        //]);

        $this->call([
                UserSeeder::class,
                HeadOfFamilySeeder::class,
            ]);
=======
        $this->call([

                UserSeeder::class,
                HeadOfFamilySeeder::class,
                SocialAssistanceSeeder::class,
            ]);

            UserSeeder::class,
            HeadOfFamilySeeder::class,
            SocialAssistanceSeeder::class,
            EventSeeder::class,
        ]);

>>>>>>> 851a6ebf494b04cd710262de18112042ddbb9bfb
    }
}
