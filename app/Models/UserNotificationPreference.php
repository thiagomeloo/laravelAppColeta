<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserNotificationPreference extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'users_notifications_preferences';
    protected $fillable = [
        'location_id',
        'raio_location',
        'accept_notification',
    ];
}
