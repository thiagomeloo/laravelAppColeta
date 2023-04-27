<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeSocialMedia extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "types_social_medias";
    protected $fillable = ["name"];

    protected $casts = [
        'name' => 'string',
    ];

    public function usersSocialMedias(): HasMany
    {
        return $this->hasMany(UserSocialMedia::class);
    }
}
