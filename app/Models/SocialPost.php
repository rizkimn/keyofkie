<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialPost extends Model
{
    protected $fillable = [
        'platform',
        'content',
        'sentiment',
        'likes',
        'comments',
        'shares',
        'created_at_post',
        'location_id',
        'created_at',
        'updated_at',
    ];
}
