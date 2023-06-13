<?php

namespace App\Repositories\Eloquent;

use App\Models\UserAddress;
use App\Repositories\EloquentBaseRepository;

class UserAddressRepository extends EloquentBaseRepository
{
    public function modelClass(): string
    {
        return UserAddress::class;
    }
}
