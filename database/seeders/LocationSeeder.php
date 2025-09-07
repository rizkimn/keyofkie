<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            [
                'name' => 'Pantai Sulamadaha',
                'description' => 'Pantai terkenal dengan air sebening kaca di Ternate.',
                'category' => 'Pantai',
                'latitude' => '0.8628092759371613',
                'longitude' => '127.33520158283113',
                'geom' => DB::raw("ST_GeomFromText('POINT(127.33520158283113 0.8628092759371613)', 4326)"),
            ],
            [
                'name' => 'Danau Tolire',
                'description' => 'Danau indah dengan legenda lokal di kaki Gunung Gamalama.',
                'category' => 'Alam',
                'latitude' => '0.8384432761701835',
                'longitude' => '127.30590042085699',
                'geom' => DB::raw("ST_GeomFromText('POINT(127.30590042085699 0.8384432761701835)', 4326)"),
            ],
            [
                'name' => 'Pulau Dodola',
                'description' => 'Pulau eksotis dengan pasir putih di Morotai.',
                'category' => 'Pulau',
                'latitude' => '2.088282417300044',
                'longitude' => '128.19085843927925',
                'geom' => DB::raw("ST_GeomFromText('POINT(128.19085843927925 2.088282417300044)', 4326)"),
            ],
            [
                'name' => 'Benteng Oranje',
                'description' => 'Benteng peninggalan Belanda di Ternate.',
                'category' => 'Sejarah',
                'latitude' => '0.7931390408826683',
                'longitude' => '127.38704600036927',
                'geom' => DB::raw("ST_GeomFromText('POINT(127.38704600036927 0.7931390408826683)', 4326)"),
            ],
            [
                'name' => 'Pulau Maitara',
                'description' => 'Pulau ikonik di antara Ternate dan Tidore.',
                'category' => 'Pulau',
                'latitude' => '0.7337551102413262',
                'longitude' => '127.37147961381065',
                'geom' => DB::raw("ST_GeomFromText('POINT(127.37147961381065 0.7337551102413262)', 4326)"),
            ],
        ];

        DB::table('locations')->insert($locations);
    }
}
