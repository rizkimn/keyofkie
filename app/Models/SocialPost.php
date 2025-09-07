<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

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

    /**
    * Get the location that owns the social_post.
    */
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function scopeStats($query)
    {
        return $query->select(
            'location_id',
            DB::raw('COUNT(*) as total_posts'),
            DB::raw('SUM(likes) as total_likes'),
            DB::raw('SUM(comments) as total_comments'),
            DB::raw('SUM(shares) as total_shares'),
            DB::raw('SUM(CASE WHEN sentiment = 1 THEN 1 ELSE 0 END) as positive'),
            DB::raw('SUM(CASE WHEN sentiment = 0 THEN 1 ELSE 0 END) as neutral'),
            DB::raw('SUM(CASE WHEN sentiment = -1 THEN 1 ELSE 0 END) as negative')
        )->groupBy('location_id');
    }
}
