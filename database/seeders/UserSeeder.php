<?php

namespace Database\Seeders;

<<<<<<< HEAD
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserFactory::new()->count(15)->create();
=======
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'id' => 1,
            'name' => 'Head User',
            'email' => 'head@example.com',
            'password' => Hash::make('password') // <- pakai hash
        ]);
>>>>>>> 851a6ebf494b04cd710262de18112042ddbb9bfb
    }
}
