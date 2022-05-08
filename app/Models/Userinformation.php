<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userinformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'education',
        'profile',
        'address',
        'phone',
        'email',
        'github',
        'linkedin',
        'skill',
        'image',
    ];
}
