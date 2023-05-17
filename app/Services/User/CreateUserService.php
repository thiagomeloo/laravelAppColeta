<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class CreateUserService
{

    /**
     * Cria ou atualiza um novo usuario.
     * @param array $data - ['name', 'email']
     * @param User $user - Instancia do usuário
     * @return object
     */
    public static function execute(array $data, User $user = null): object
    {
        try {

            if (!$data) {
                throw new \Exception("Dados não informados!");
            }

            DB::beginTransaction();

            $userData = $user ?? new User();
            isset($data['name']) ? $userData->name = $data['name'] : null;
            isset($data['email']) ? $userData->email = $data['email'] : null;
            $userData->save();

            DB::commit();

            $text = $user ? "Usuário atualizado com sucesso!" : "Usuário criado com sucesso!";

            return (object)[
                "status" => true,
                "message" => (object)[
                    "type" => "success",
                    "text" => $text
                ],
                "data" => $userData
            ];
        } catch (\Throwable $th) {

            DB::rollBack();

            $textError = $user ? "Erro ao atualizar usuário!" : "Erro ao criar usuário!";

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
