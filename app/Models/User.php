<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Concerns\UsesUuid;

class User extends Authenticatable
{
    use HasFactory, Notifiable, UsesUuid;

    protected $fillable = [

        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'rememeber_toke',
    ];
}
