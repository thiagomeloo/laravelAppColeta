<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPreferences extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "users_preferences";
    protected $fillable = ["public_profile"];
}
