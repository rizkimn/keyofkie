<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PopularityAnalysis extends Model
{
    protected $fillable = [
        'location_id',
        'period_date',
        'score',
        'total_posts',
        'positive_posts',
        'negative_posts',
        'neutral_posts',
        'created_at',
        'updated_at',
    ];
}
