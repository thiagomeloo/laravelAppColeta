<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserNotificationPreferenceMaterialType extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'users_notifications_preferences_events';
    protected $fillable = [
        'notification_preference_id',
        'event_id',
    ];
}
