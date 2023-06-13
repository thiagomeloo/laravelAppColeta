<?php

namespace App\Repositories\Eloquent;

use App\Models\Location;
use App\Repositories\EloquentBaseRepository;

class LocationRepository extends EloquentBaseRepository
{
    public function modelClass(): string
    {
        return Location::class;
    }
}
