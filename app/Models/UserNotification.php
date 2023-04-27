<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserNotification extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'users_notifications';
    protected $fillable = ['user_id', 'title', 'description', 'dateView'];

    protected $casts = [
        'user_id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'dateView' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
