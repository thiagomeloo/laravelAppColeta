<?php

namespace Database\Seeders;

use App\Models\TypeMaterial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesMaterialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeMaterial::upsert(
            [
                ["name" => "papel"],
                ["name" => "plástico"],
                ["name" => "vidro"],
                ["name" => "metal"],
                ["name" => "madeira"],
                ["name" => "tecido"],
                ["name" => "eletrodomésticos"],
                ["name" => "eletrônico"],
                ["name" => "pilhas"],
                ["name" => "óleo de cozinha"],
                ["name" => "remédio e medicamentos"],
                ["name" => "outros"],
            ], ["name"]
        );
    }
}
