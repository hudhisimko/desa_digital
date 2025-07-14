<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\SocialAssistanceSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([


                UserSeeder::class,
                HeadOfFamilySeeder::class,
                SocialAssistanceSeeder::class,
                EventSeeder::class,
                DevelopmentSeeder::class,

            UserSeeder::class,
            HeadOfFamilySeeder::class,
            SocialAssistanceSeeder::class,
            EventSeeder::class,
            EventParticipantSeeder::class

        ]);

        // User::factory(10)->create();

        //User::factory()->create([
        //    'name' => 'Test User',
        //    'email' => 'test@example.com',
        //]);

        $this->call([
                SocialAssistanceSeeder::class,
                HeadOfFamilySeeder::class,
                SocialAssistanceSeeder::class,
                EventSeeder::class,
        ]);
    }
}
