<?php

namespace App\Repositories\Eloquent;

use App\Models\UserNotificationEvent;
use App\Repositories\EloquentBaseRepository;

class UserNotificationEventRepository extends EloquentBaseRepository
{
    public function modelClass(): string
    {
        return UserNotificationEvent::class;
    }
}
