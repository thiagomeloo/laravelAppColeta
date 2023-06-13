<?php

namespace App\Models;

use App\Enum\FrequencyEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "events";
    protected $fillable = ["location_id", "type_material_id", "owner_id", "status_event_id", "type_action_id", "title", "description", "frequency"];

    protected $casts = [
        'location_id' => 'integer',
        'type_material_id' => 'integer',
        'owner_id' => 'integer',
        'status_event_id' => 'integer',
        'type_action_id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'frequency' => FrequencyEnum::class,
    ];

    protected $with = ["owner", "statusEvent", "typeMaterial"];

    public function eventInteractions(): HasMany
    {
        return $this->hasMany(EventInteraction::class);
    }

    public function eventInteractionsResponses(): HasManyThrough
    {
        return $this->hasManyThrough(EventInteractionResponse::class, EventInteraction::class, 'event_id', 'event_interaction_id');
    }


    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function statusEvent(): BelongsTo
    {
        return $this->belongsTo(StatusEvent::class);
    }

    public function typeMaterial(): BelongsTo
    {
        return $this->belongsTo(TypeMaterial::class);
    }

    public function typeAction(): BelongsTo
    {
        return $this->belongsTo(TypeAction::class);
    }
}
