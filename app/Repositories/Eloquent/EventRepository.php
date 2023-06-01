<?php

namespace App\Repositories\Eloquent;

use App\Models\Event;
use App\Repositories\EloquentBaseRepository;

class EventRepository extends EloquentBaseRepository
{
    public function modelClass(): string
    {
        return Event::class;
    }
}
