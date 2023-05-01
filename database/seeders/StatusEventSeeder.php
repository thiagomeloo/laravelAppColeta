<?php

namespace Database\Seeders;

use App\Models\StatusEvent;
use Illuminate\Database\Seeder;

class StatusEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statusEvent = [
            ["name" => "Pendente"],
            ["name" => "Em andamento"],
            ["name" => "Finalizado"],
        ];

        foreach ($statusEvent as $status) {
            StatusEvent::create($status);
        }
    }
}
