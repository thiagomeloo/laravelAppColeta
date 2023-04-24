<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserSocialMedia extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "users_social_medias";
    protected $fillable = ["user_id", "type_social_media_id", "content"];
}
