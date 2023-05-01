<?php

namespace Database\Seeders;

use App\Models\TypeMaterial;
use Illuminate\Database\Seeder;

class TypeMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typesMaterial = [
            ["name" => "Óleo"],
            ["name" => "Lixo Eletrônico"],
            ["name" => "Pilhas e Baterias"],
            ["name" => "Eletrodomésticos"],
            ["name" => "Papel"],
            ["name" => "Vidro"],
            ["name" => "Plástico"],
            ["name" => "Alumínio"],
            ["name" => "Diversos"],
        ];

        foreach ($typesMaterial as $typeMaterial) {
            TypeMaterial::create($typeMaterial);
        }
    }
}
