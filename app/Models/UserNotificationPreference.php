<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserNotificationPreference extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'users_notifications_preferences';
    protected $fillable = [ 'location_id', 'raio_location', 'accept_notification'];

    protected $casts = [
        'location_id' => 'integer',
        'raio_location' => 'integer',
        'accept_notification' => 'boolean',
    ];

    public function usersNotificationsPreferencesTypesMaterials(): HasMany
    {
        return $this->hasMany(UserNotificationPreferenceTypeMaterial::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}
