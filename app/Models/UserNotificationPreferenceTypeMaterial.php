<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserNotificationPreferenceTypeMaterial extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'users_notifications_preferences_materials_types';
    protected $fillable = ['notification_preference_id','type_material_id'];

    protected $casts = [
        'notification_preference_id' => 'integer',
        'type_material_id' => 'integer',
    ];

    public function userNotificationPreference(): BelongsTo
    {
        return $this->belongsTo(UserNotificationPreference::class);
    }

    public function typeMaterial(): BelongsTo
    {
        return $this->belongsTo(TypeMaterial::class);
    }
}
