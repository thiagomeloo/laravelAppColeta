<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\EloquentBaseRepository;

class UserRepository extends EloquentBaseRepository
{
    public function modelClass(): string
    {
        return User::class;
    }
}
