<?php

namespace App\Services\User;

use App\Models\User;
use App\Services\UserSocialMedia\CreateUserSocialMediaService;

/**
 * Cria um novo usuário/atualiza junto com a relação de rede social.
 */
class CreateOrUpdateUserBySocialMediaService
{

    public static function execute(array $data): object
    {
        try {

            // Verifica se o usuário já existe
            $user = User::where('email', $data['email'])->first();

            $response = CreateUserService::execute($data, $user ?? null);

            if (!$response->status) {
                return $response;
            }

            // Pega o usuário criado/atualizado
            $user = $response->data;

            //Verifica se o usuário ja possui a rede social informada.
            $userSocialMedia = $user->userSocialMedia()->where('type_social_media_id', $data['type_social_media_id'])->first();


            //Cria ou atualiza a relação de usuário e rede social
            $response = CreateUserSocialMediaService::execute([
                "user_id" => $user->id,
                "type_social_media_id" => $data['type_social_media_id'],
                "content" => $data['content'] ?? null
            ], $userSocialMedia ?? null);

            //Verifica se ocorreu algum erro ao criar a relação de usuário e rede social
            if (!$response->status) {
                return $response;
            }

            // Pega a relação de usuário e rede social criada/atualizada
            $userSocialMedia = $response->data;

            return (object)[
                "status" => true,
                "message" => (object)[
                    "type" => "success",
                    "text" => "Usuário criado com sucesso!"
                ],
                "data" => (object)[
                    "user" => $user,
                    "userSocialMedia" => $userSocialMedia
                ]
            ];
        } catch (\Throwable $th) {
            $textError = $user ? "Erro ao criar o usuário a partir de uma rede social." : "Erro ao atualizar o usuário a partir de uma rede social.";
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
