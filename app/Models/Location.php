<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "locations";
    protected $fillable = ["latitude", "longitude"];

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function usersNotificationsPreferences(): HasMany
    {
        return $this->hasMany(UserNotificationPreference::class);
    }

    public function usersAddresses(): HasMany
    {
        return $this->hasMany(UserAddress::class);
    }
}
