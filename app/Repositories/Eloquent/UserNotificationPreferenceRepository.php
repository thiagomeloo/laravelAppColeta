<?php

namespace App\Repositories\Eloquent;

use App\Models\UserNotificationPreference;
use App\Repositories\EloquentBaseRepository;

class UserNotificationPreferenceRepository extends EloquentBaseRepository
{
    public function modelClass(): string
    {
        return UserNotificationPreference::class;
    }
}
