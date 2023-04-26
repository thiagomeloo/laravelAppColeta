<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeAction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "types_actions";
    protected $fillable = ["name"];

    protected $casts = [
        'name' => 'string',
    ];
}
