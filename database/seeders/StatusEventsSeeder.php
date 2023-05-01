<?php

namespace Database\Seeders;

use App\Models\StatusEvent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusEventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StatusEvent::upsert(
            [
                ["name" => "cancelado"],
                ["name" => "em andamento"],
                ["name" => "finalizado"],
                ["name" => "pendente"],
            ], ["name"]
        );
    }
}
