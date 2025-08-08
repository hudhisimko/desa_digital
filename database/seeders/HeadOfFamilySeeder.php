<?php

namespace Database\Seeders;

use App\Models\HeadOfFamily;
use Database\Factories\HeadOfFamilyFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeadOfFamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserFactory::new()->count(15)->create()->each(function ($user){
            $headOfFamily = HeadOfFamilyFactory::new()->count(1)->create([
                'user_id' => $user->id
            ]); 
        });
    }
}
