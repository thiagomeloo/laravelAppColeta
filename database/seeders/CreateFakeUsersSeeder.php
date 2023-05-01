<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserSocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateFakeUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)
            ->has(UserSocialMedia::factory()->count(1))
            ->create();
    }
}
