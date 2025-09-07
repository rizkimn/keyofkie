<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PopularityAnalysisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = DB::table('locations')->pluck('id')->toArray();

        foreach ($locations as $locationId) {
            // kita buat data untuk 6 bulan terakhir
            for ($i = 0; $i < 6; $i++) {
                $periodDate = Carbon::now()->subMonths($i)->startOfMonth()->toDateString();

                $totalPosts = rand(50, 200);
                $positivePosts = rand(0, $totalPosts);
                $negativePosts = rand(0, $totalPosts - $positivePosts);
                $neutralPosts  = $totalPosts - $positivePosts - $negativePosts;

                // skor bisa dihitung dari rasio positif dibanding total
                $score = $totalPosts > 0
                    ? round((($positivePosts * 2) + $neutralPosts - ($negativePosts * 2)) / $totalPosts * 100, 2)
                    : 0;

                DB::table('popularity_analyses')->insert([
                    'location_id'     => $locationId,
                    'period_date'     => $periodDate,
                    'score'           => $score,
                    'total_posts'     => $totalPosts,
                    'positive_posts'  => $positivePosts,
                    'negative_posts'  => $negativePosts,
                    'neutral_posts'   => $neutralPosts,
                    'created_at'      => now(),
                    'updated_at'      => now(),
                ]);
            }
        }
    }
}
