<?php

namespace Database\Seeders;

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
    }
}
