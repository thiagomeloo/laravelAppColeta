<?php

namespace Database\Seeders;

use App\Models\TypeSocialMedia;
use Illuminate\Database\Seeder;

class TypeSocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typesSocialMedias = [
            ["name" => "Google"],
            ["name" => "Facebook"]
        ];

        foreach ($typesSocialMedias as $typeSocialMedia) {
            TypeSocialMedia::create($typeSocialMedia);
        }
    }
}
