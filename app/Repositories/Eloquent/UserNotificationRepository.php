<?php

namespace App\Repositories\Eloquent;

use App\Models\UserNotification;
use App\Repositories\EloquentBaseRepository;

class UserNotificationRepository extends EloquentBaseRepository
{
    public function modelClass(): string
    {
        return UserNotification::class;
    }
}
