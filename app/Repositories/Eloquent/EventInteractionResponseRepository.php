<?php

namespace App\Repositories\Eloquent;

use App\Models\EventInteraction;
use App\Repositories\EloquentBaseRepository;

class EventInteractionResponseRepository extends EloquentBaseRepository
{
    public function modelClass(): string
    {
        return EventInteraction::class;
    }
}
