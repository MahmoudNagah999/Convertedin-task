<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserFactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // non-admin users
        User::factory()->count(10000)->create();

        // admin users
        User::factory()->count(100)->admin()->create();
    }
}
