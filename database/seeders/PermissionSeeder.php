<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    private $permissions = [
        'dashboard' => [
            'menu'
        ],

        'head-of-family' => [
            'menu',
            'list',
            'create',
            'edit',
            'delete',
        ],
    ];

    public function run(): void
    {
        //
    }
}
