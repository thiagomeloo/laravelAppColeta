<?php
namespace App\Services\Location;

use App\Models\Location;
use Illuminate\Support\Facades\DB;

class EditLocationService
{
    public static function execute(array $dados, Location $location): object
    {
        try {
            DB::beginTransaction();

            $location->latitude = $dados['latitude'];
            $location->longitude = $dados['longitude'];
            $location->save();

            DB::commit();

            return (object) [
                'status' => true,
                'data' => $location,
                'message' => (object) [
                    'type' => 'error',
                    'text' => 'Localização atualizada com sucesso'
                ],
            ];
        } catch (\Throwable $th) {
            DB::rollBack();

            return (object) [
                'status' => false,
                'message' => (object) [
                    'type' => 'error',
                    'text' => 'Erro ao atualizar localização!'
                ],
            ];
        }
    }
}
