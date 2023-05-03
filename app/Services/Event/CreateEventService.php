<?php
namespace App\Services\Event;

use App\Enum\FrequencyEnum;
use App\Models\Event;
use App\Models\StatusEvent;
use App\Services\Location\CreateLocationService;
use Illuminate\Support\Facades\DB;

class CreateEventService
{

    public static function execute(array $data)
    {
        try {
            DB::beginTransaction();

            $responseLocation = CreateLocationService::execute([
                "latitude" => $data['latitude'],
                "longitude" => $data['longitude'],
            ]);
            if(!$responseLocation['status']) throw new \Exception($responseLocation['message']);

            $location = $responseLocation['data'];

            $event = new Event();
            $event->location_id = $location->id;
            $event->type_material_id = $data["type_material_id"];
            $event->owner_id = $data["owner_id"];
            $event->status_event_id = StatusEvent::firstWhere("name", "pendente")->id;
            $event->title = $data["title"];
            $event->description = $data["description"];
            $event->frequency = FrequencyEnum::getValue($data["frequency"]);
            $event->save();

            DB::commit();

            return [
                "status" => true,
                "data" => $event,
                "message" => "Evento criado com sucesso!"
            ];
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);

            return [
                "status" => false,
                "message" => "Erro ao criar evento!"
            ];
        }
    }
}
