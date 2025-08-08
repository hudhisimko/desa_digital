<?php

namespace Database\Seeders;

use App\Models\SocialAssistance;
use Database\Factories\EventFactory;
use Database\Factories\SocialAssistanceFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialAssistanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
       SocialAssistanceFactory::new()->count(10)->create();
    }
}
