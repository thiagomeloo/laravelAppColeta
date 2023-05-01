<?php

namespace Database\Seeders;

use App\Models\TypeAction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesActionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeAction::upsert(
            [
                ["name" => "coletar"],
                ["name" => "descartar"],
            ], ["name"]
        );
    }
}
