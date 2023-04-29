<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserNotificationEvent extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'users_notifications_events';
    protected $fillable = ['user_id', 'event_id'];

    protected $casts = [
        'user_id' => 'integer',
        'event_id' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
