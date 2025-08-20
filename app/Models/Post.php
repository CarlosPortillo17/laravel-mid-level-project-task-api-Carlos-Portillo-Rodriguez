<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\UsesUuid;

class Post extends Model
{
    use HasFactory, UsesUuid;

    protected $fillable = [

        'title',
        'content',
        'user_id',
    ];
public function user ()
{
    return $this->belongsTo(User::class);
}
}