<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusEvent extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "status_events";
    protected $fillable = ["name"];

    protected $casts = [
        'name' => 'string',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
