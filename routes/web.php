<?php

use App\Models\Location;
use App\Models\SocialPost;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $locations = Location::with(['socialPosts' => fn($q) => $q->stats()])->get();
    $trendRaw = DB::table('social_posts')
        ->join('locations', 'locations.id', '=', 'social_posts.location_id')
        ->selectRaw("locations.name as location")
        ->selectRaw("to_char(created_at_post, 'YYYY-MM') as month")
        ->selectRaw("SUM(likes + comments + shares) as total_engagement")
        ->whereNotNull('created_at_post')
        ->where('created_at_post', '>=', Carbon::now()->subMonths(6))
        ->groupBy('locations.name', DB::raw("to_char(created_at_post, 'YYYY-MM')"))
        ->orderBy('month', 'asc')
        ->get();

    // Bentuk ulang data agar enak dipakai di frontend
    $trendData = SocialPost::select(
        DB::raw('location_id'),
        DB::raw("TO_CHAR(created_at_post, 'YYYY-MM') as month"),
        DB::raw('COUNT(*) as total')
    )
    ->where('created_at_post', '>=', now()->subMonths(6))
    ->groupBy('location_id', 'month')
    ->orderBy('month')
    ->get()
    ->groupBy('location_id');

    // Sentiment summary
    $sentimentSummary = SocialPost::select(
        DB::raw('location_id'),
        DB::raw('SUM(CASE WHEN sentiment = 1 THEN 1 ELSE 0 END) as positive'),
        DB::raw('SUM(CASE WHEN sentiment = 0 THEN 1 ELSE 0 END) as neutral'),
        DB::raw('SUM(CASE WHEN sentiment = -1 THEN 1 ELSE 0 END) as negative')
    )
    ->groupBy('location_id')
    ->get()
    ->mapWithKeys(function ($row) {
        $total = $row->positive + $row->neutral + $row->negative;
        return [
            $row->location_id => [
                'positive' => $total > 0 ? round(($row->positive / $total) * 100, 1) : 0,
                'neutral'  => $total > 0 ? round(($row->neutral / $total) * 100, 1) : 0,
                'negative' => $total > 0 ? round(($row->negative / $total) * 100, 1) : 0,
            ]
        ];
    });

    return view('homepage', compact(
        'locations',
        'trendData',
        'sentimentSummary'
    ));
});
