<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAddress extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "users_addresses";
    protected $fillable = ["user_id", "location_id", "address", "city", "state", "zipcode"];

    protected $casts = [
        'user_id' => 'integer',
        'location_id' => 'integer',
        'address' => 'string',
        'city' => 'string',
        'state' => 'string',
        'zipcode' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}
