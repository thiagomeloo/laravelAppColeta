<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventInteraction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "events_interactions";
    protected $fillable = ["event_id", "user_id", "title", "text"];
}
