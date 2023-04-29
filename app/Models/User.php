<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "users";
    protected $fillable = ["name", "email"];

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
    ];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function eventsInteractions(): HasMany
    {
        return $this->hasMany(EventInteraction::class);
    }

    public function eventsInteractionsResponses(): HasMany
    {
        return $this->hasMany(EventInteractionResponse::class);
    }

    public function usersNotifications(): HasMany
    {
        return $this->hasMany(UserNotification::class);
    }

    public function usersNotificationsEvents(): HasMany
    {
        return $this->hasMany(UserNotificationEvent::class);
    }

    public function userSocialMedia(): HasOne
    {
        return $this->hasOne(UserSocialMedia::class);
    }
}
