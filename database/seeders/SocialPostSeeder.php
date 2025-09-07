<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = DB::table('locations')->pluck('id')->toArray();
        $platforms = ['Instagram', 'Twitter', 'TikTok'];

        foreach ($locations as $locationId) {
            for ($i = 0; $i < 20; $i++) {
                $platform = $platforms[array_rand($platforms)];

                $likes    = rand(0, 500);
                $comments = rand(0, 100);
                $shares   = rand(0, 50);

                // mapping: -1 = negative, 0 = neutral, 1 = positive
                $sentiment = [ -1, 0, 1 ][array_rand([ -1, 0, 1 ])];

                DB::table('social_posts')->insert([
                    'platform'        => $platform,
                    'content'         => fake()->sentence(12),
                    'sentiment'       => $sentiment,
                    'likes'           => $likes,
                    'comments'        => $comments,
                    'shares'          => $shares,
                    'created_at_post' => Carbon::now()->subDays(rand(0, 180)),
                    'location_id'     => $locationId,
                    'created_at'      => now(),
                    'updated_at'      => now(),
                ]);
            }
        }
    }
}
