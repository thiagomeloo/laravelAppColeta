<?php
namespace App\Services\Event;

use App\Enum\FrequencyEnum;
use App\Models\Event;
use App\Models\StatusEvent;
use App\Services\Location\CreateLocationService;
use Illuminate\Support\Facades\DB;

class CreateEventService
{

    public static function execute(array $data): object
    {
        try {
            DB::beginTransaction();

            $responseLocation = CreateLocationService::execute([
                "latitude" => $data['latitude'],
                "longitude" => $data['longitude'],
            ]);
            if(!$responseLocation->status) throw new \Exception($responseLocation->message->text);

            $location = $responseLocation->data;

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

            return (object) [
                "status" => true,
                "data" => $event,
                "message" => (object) [
                    "type" => "success",
                    "text" => "Evento criado com sucesso!"
                ]
            ];
        } catch (\Throwable $th) {
            DB::rollBack();

            return (object) [
                "status" => false,
                "message" => (object) [
                    "type" => "error",
                    "text" => "Erro ao criar evento!"
                ]
            ];
        }
    }
}
