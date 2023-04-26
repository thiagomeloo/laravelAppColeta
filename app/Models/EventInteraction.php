<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventInteraction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "events_interactions";
    protected $fillable = ["event_id", "user_id", "title", "text"];

    protected $casts = [
        'event_id' => 'integer',
        'user_id' => 'integer',
        'title' => 'string',
        'text' => 'string',
    ];

    public function eventInteractionsResponses(): HasMany
    {
        return $this->hasMany(EventInteractionResponse::class);
    }


    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
