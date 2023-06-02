<?php

namespace App\Services\Event;

use App\Enum\FrequencyEnum;
use App\Interfaces\RepositoryInterface;
use App\Models\StatusEvent;
use App\Repositories\Eloquent\EventRepository;
use App\Services\BaseRepositoryService;
use App\Services\Location\LocationService;
use App\Services\ResponseService;

/**
 * Classe que representa o serviço para manipulação de dados do eventosdcfx.
 */
class EventService extends BaseRepositoryService
{
    public function repositoryClass(): RepositoryInterface
    {
        return new EventRepository();
    }

    /**
     * Cria um novo evento.
     *
     * @param array $data
     * @return ResponseService
     */
    public function save(array $data): ResponseService
    {

        // Salva a localização
        $locationResponse = LocationService::getInstance()
            ->save([
                "latitude" => $data['latitude'],
                "longitude" => $data['longitude'],
            ]);

        if (!$locationResponse->hasError()) {
            return $locationResponse;
        }

        $location = $locationResponse->getData();

        // Salva o evento
        $event = $this->getRepository()->create([
            "location_id" => $location->id,
            "type_material_id" => $data["type_material_id"],
            "owner_id" => $data["owner_id"],
            "status_event_id" => StatusEvent::firstWhere("name", "pendente")->id,
            "type_action_id" => $data["type_action_id"],
            "title" => $data["title"],
            "description" => $data["description"],
            "frequency" => FrequencyEnum::getValue($data["frequency"]),
        ]);

        if ($event) {
            return $this->responseService(true, "Evento criado com sucesso!", $event);
        }

        return $this->responseService(false, "Erro ao criar evento!");
    }
}
