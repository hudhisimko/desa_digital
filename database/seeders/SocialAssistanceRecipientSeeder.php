<?php

namespace Database\Seeders;

use App\Models\SocialAssistanceRecipient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HeadOfFamily;
use App\Models\SocialAssistance;


class SocialAssistanceRecipientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $families = HeadOfFamily::all();
        $assistances = SocialAssistance::all();

        // Loop setiap kombinasi keluarga dan bantuan
        foreach ($families as $family) {
            foreach ($assistances as $assistance) {
                SocialAssistanceRecipient::factory()->create([
                    'head_of_family_id' => $family->id,
                    'social_assistance_id' => $assistance->id,
                ]);
            }
        }

    }
}
