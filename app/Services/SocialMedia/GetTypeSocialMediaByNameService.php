<?php
namespace App\Services\SocialMedia;

use App\Models\TypeSocialMedia;
use Illuminate\Support\Facades\DB;

class GetTypeSocialMediaByNameService {

    /**
     * Retorna um tipo de rede social pelo nome.
     * @param array $data - ['name']
     * @return object
     */
    public static function execute(array $data) : object
    {
        try {

            $socialMedia = TypeSocialMedia::firstWhere("name", $data["name"]);

            return (object)[
                "status" => true,
                "message" => (object)[
                    "type" => "success",
                    "text" => "Rede social encontrada com sucesso!"
                ],
                "data" => $socialMedia ?? null
            ];


        } catch (\Throwable $th) {
            return (object)[
                "status" => false,
                "message" => (object)[
                    "type" => "error",
                    "text" => "Erro ao buscar rede social pelo nome."
                ],
            ];
        }
    }

}
