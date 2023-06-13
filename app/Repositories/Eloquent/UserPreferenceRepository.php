<?php

namespace App\Repositories\Eloquent;

use App\Models\UserPreference;
use App\Repositories\EloquentBaseRepository;

class UserPreferenceRepository extends EloquentBaseRepository
{
    public function modelClass(): string
    {
        return UserPreference::class;
    }
}
