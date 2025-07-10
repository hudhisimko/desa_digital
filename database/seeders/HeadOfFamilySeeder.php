<?php

namespace Database\Seeders;

<<<<<<< HEAD
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
=======
use Illuminate\Database\Seeder;
use App\Models\HeadOfFamily;
use Database\Factories\FamilyMemberFactory;
use Database\Factories\HeadOfFamilyFactory;
use Database\Factories\UserFactory;
use Illuminate\Support\Str;

class HeadOfFamilySeeder extends Seeder
{
    public function run(): void
    {
        UserFactory::new()->count(15)->create()->each(function ($user) {
            $headofFamily = HeadOfFamilyFactory::new()->create(['user_id' => $user->id]);

            FamilyMemberFactory::new()->count(5)->create(['head_of_family_id' => $headofFamily->id, 'user_id' => UserFactory::new()->create()->id]);
>>>>>>> 851a6ebf494b04cd710262de18112042ddbb9bfb
        });
    }
}
