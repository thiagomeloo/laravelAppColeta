<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;

class CreateNewEventService
{
    public static function execute(array $data)
    {
        try {
            DB::beginTransaction();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            dd($th);
        }
    }
}
