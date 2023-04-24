<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventInteractionResponse extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "events_interactions_responses";
    protected $fillable = ["event_interaction_id", "user_id", "text"];
}
