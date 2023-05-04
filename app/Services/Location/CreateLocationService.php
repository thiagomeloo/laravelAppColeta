<?php
namespace App\Services\Location;

use App\Models\Location;
use Illuminate\Support\Facades\DB;

class CreateLocationService
{
    public static function execute(array $data): object
    {
        try {
            DB::beginTransaction();

            $location = new Location();
            $location->latitude = $data['latitude'];
            $location->longitude = $data['longitude'];
            $location->save();

            DB::commit();

            return (object) [
                "status" => true,
                "data" => $location,
                "message" => (object) [
                    "type" => "success",
                    "text" => "Localização criada com sucesso!"
                ]
            ];
        } catch (\Throwable $th) {
            DB::rollBack();

            return (object) [
                "status" => false,
                "message" => (object) [
                    "type" => "error",
                    "text" => "Erro ao criar localização!"
                ]
            ];
        }
    }
}
