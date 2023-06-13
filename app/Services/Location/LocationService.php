<?php

namespace App\Services\Location;

use App\Interfaces\RepositoryInterface;
use App\Repositories\Eloquent\LocationRepository;
use App\Services\BaseRepositoryService;
use App\Services\ResponseService;

/**
 * Classe que representa o serviço para manipulação de dados de localização.
 */
class LocationService extends BaseRepositoryService
{
    public function repositoryClass(): RepositoryInterface
    {
        return new LocationRepository();
    }

    /**
     * Cria uma nova localização.
     *
     * @param array $data
     * @return ResponseService
     */
    public function save(array $data): ResponseService
    {
        $location = $this->getRepository()->create($data);

        if ($location) {
            return $this->responseService(true, "Localização criada com sucesso!", $location);
        }

        return $this->responseService(false, "Erro ao criar localização!");
    }
}
