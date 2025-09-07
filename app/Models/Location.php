<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    protected $fillable = [
        'name',
        'description',
        'category',
        'latitude',
        'longitude',
        'geom',
    ];

    /**
     * Get the social_posts for the location.
     */
    public function socialPosts(): HasMany
    {
        return $this->hasMany(SocialPost::class);
    }
}
