<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeMaterial extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "types_materials";
    protected $fillable = ["name"];

    protected $casts = [
        'name' => 'string',
    ];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function usersNotifications(): HasMany
    {
        return $this->hasMany(UserNotification::class);
    }
}
