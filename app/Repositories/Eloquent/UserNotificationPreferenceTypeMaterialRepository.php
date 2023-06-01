<?php

namespace App\Repositories\Eloquent;

use App\Models\UserNotificationPreferenceTypeMaterial;
use App\Repositories\EloquentBaseRepository;

class UserNotificationPreferenceTypeMaterialRepository extends EloquentBaseRepository
{
    public function modelClass(): string
    {
        return UserNotificationPreferenceTypeMaterial::class;
    }
}
