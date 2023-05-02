<?php

namespace Database\Seeders;

use App\Models\TypeAction;
use Illuminate\Database\Seeder;

class TypeActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typesAction = [
            ["name" => "Coleta"],
            ["name" => "Descarte"],
        ];

        foreach ($typesAction as $typeAction) {
            TypeAction::create($typeAction);
        }
    }
}
