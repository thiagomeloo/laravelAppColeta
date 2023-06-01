<?php

namespace App\Repositories\Eloquent;

use App\Models\UserSocialMedia;
use App\Repositories\EloquentBaseRepository;

class UserSocialMediaRepository extends EloquentBaseRepository
{
    public function modelClass(): string
    {
        return UserSocialMedia::class;
    }
}
