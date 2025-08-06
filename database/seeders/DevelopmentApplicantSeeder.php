<?php

namespace Database\Seeders;

use App\Models\Development;
use App\Models\DevelopmentApplicant;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;



class DevelopmentApplicantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $developments = Development::all();
        $users = User::all();

        foreach ($developments as $development) {
            foreach ($users as $user) {
                DevelopmentApplicant::factory()->create([
                    'development_id' => $development->id,
                    'user_id' => $user->id,
                ]);
            }
        }

         $development = Development::all();
         $users = User::all();

         foreach($development as $development) {
            foreach ($users as $user) {
                DevelopmentApplicant::factory()->create([
                   'development_id' => $development->id,
                   'user_id' => $user->id
                ]);
            }
         }

    }
}
