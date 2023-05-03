<?php

namespace App\Services\UserSocialMedia;

use App\Models\UserSocialMedia;
use Illuminate\Support\Facades\DB;

class CreateUserSocialMediaService {

    /**
     * Cria uma nvova relação de usuário e rede social.
     * @param array $data - ['user_id', 'type_social_media_id', 'content']
     * @param UserSocialMedia $userSocialMedia - Instância de UserSocialMedia
     * @return object
     */
    public static function execute(array $data, UserSocialMedia $userSocialMedia = null) : object
    {
        try {
            DB::beginTransaction();

            $userSocialMediaData = $userSocialMedia ?? new UserSocialMedia();
            isset($data['user_id']) ? $userSocialMediaData->user_id = $data['user_id'] : null;
            isset($data['type_social_media_id']) ? $userSocialMediaData->type_social_media_id = $data['type_social_media_id'] : null;
            isset($data['content']) ? $userSocialMediaData->content = $data['content'] : null;
            $userSocialMediaData->save();

            DB::commit();

            $text = $userSocialMedia ? "Relação de usuário e rede social atualizada com sucesso!" : "Relação de usuário e rede social criada com sucesso!";

            return (object)[
                "status" => true,
                "message" => (object)[
                    "type" => "success",
                    "text" => $text
                ],
                "data" => $userSocialMediaData
            ];


        } catch (\Throwable $th) {

            DB::rollBack();

            $textError = $userSocialMedia ? "Erro ao atualizar a relação de usuário e rede social." : "Erro ao criar a relação de usuário e rede social.";
            dd($th);
            return (object)[
                "status" => false,
                "message" => (object)[
                    "type" => "error",
                    "text" => $textError
                ],
            ];
        }
    }

}
