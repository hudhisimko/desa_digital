<?php

namespace Database\Seeders;


use App\Models\SocialAssistance;



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


        SocialAssistance::create([
            'thumbnail' => 'https://via.placeholder.com/640x480.png/003388?text=voluptates',
            'name' => 'Bantuan Tunai UD Permata',
            'category' => 'subsidized fuel',
            'amount' => 728631.74,
            'provider' => 'Fa Mahendra Fujiati',
            'description' => 'Reum molestias voluptas deserunt sint voluptatum veniam facilis.',
            'is_available' => true
        ]);

    }
}
