<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\UserFactory;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        UserFactory::new()->count(15)->create();
    }
}
