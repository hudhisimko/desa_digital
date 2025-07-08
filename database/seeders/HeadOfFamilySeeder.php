<?php

namespace Database\Seeders;

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
        });
    }
}
