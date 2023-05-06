<?php
namespace App\Services\Event;

use App\Enum\FrequencyEnum;
use App\Models\Event;
use App\Models\StatusEvent;
use App\Services\Location\EditLocationService;
use Illuminate\Support\Facades\DB;

class EditEventService
{
    public static function execute(array $data, Event $event): object
    {
        try {
            DB::beginTransaction();

            $resposeLocation = EditLocationService::execute([
                "latitude" => $data['latitude'],
                "longitude" => $data['longitude'],
            ], $event->location);
            if(!$resposeLocation->status) throw new \Exception($resposeLocation->message->text);

            $event->type_material_id = $data["type_material_id"];
            $event->title = $data["title"];
            $event->description = $data["description"];
            $event->frequency = FrequencyEnum::getValue($data["frequency"]);
            $event->save();

            DB::commit();

            return (object) [
                'status' => true,
                'data' => $event->refresh(),
                'message' => (object) [
                    'type' => 'success',
                    'text' => 'Evento atualizado com sucesso!'],
            ];
        } catch (\Throwable $th) {
            DB::rollBack();

            return (object) [
                'status' => false,
                'message' => (object) [
                    'type' => 'error',
                    'text' => 'Erro ao atualizar evento!'],
            ];
        }
    }
}
