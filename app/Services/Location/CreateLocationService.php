<?php
namespace App\Services\Location;

use App\Models\Location;
use Illuminate\Support\Facades\DB;

class CreateLocationService
{
    public static function execute(array $data)
    {
        try {
            DB::beginTransaction();

            $location = new Location();
            $location->latitude = $data['latitude'];
            $location->longitude = $data['longitude'];
            $location->save();

            DB::commit();

            return [
                "status" => true,
                "data" => $location,
                "message" => "Localização criada com sucesso!"
            ];
        } catch (\Throwable $th) {
            DB::rollBack();

            return [
                "status" => false,
                "message" => "Erro ao criar localização!"
            ];
        }
    }
}
