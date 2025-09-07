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
                'latitude' => '0.854',
                'longitude' => '127.325',
                'geom' => DB::raw("ST_GeomFromText('POINT(127.325 0.854)', 4326)"),
            ],
            [
                'name' => 'Danau Tolire',
                'description' => 'Danau indah dengan legenda lokal di kaki Gunung Gamalama.',
                'category' => 'Alam',
                'latitude' => '0.800',
                'longitude' => '127.344',
                'geom' => DB::raw("ST_GeomFromText('POINT(127.344 0.800)', 4326)"),
            ],
            [
                'name' => 'Pulau Dodola',
                'description' => 'Pulau eksotis dengan pasir putih di Morotai.',
                'category' => 'Pulau',
                'latitude' => '2.300',
                'longitude' => '128.433',
                'geom' => DB::raw("ST_GeomFromText('POINT(128.433 2.300)', 4326)"),
            ],
            [
                'name' => 'Benteng Oranje',
                'description' => 'Benteng peninggalan Belanda di Ternate.',
                'category' => 'Sejarah',
                'latitude' => '0.795',
                'longitude' => '127.377',
                'geom' => DB::raw("ST_GeomFromText('POINT(127.377 0.795)', 4326)"),
            ],
            [
                'name' => 'Pulau Maitara',
                'description' => 'Pulau ikonik di antara Ternate dan Tidore.',
                'category' => 'Pulau',
                'latitude' => '0.725',
                'longitude' => '127.400',
                'geom' => DB::raw("ST_GeomFromText('POINT(127.400 0.725)', 4326)"),
            ],
        ];

        DB::table('locations')->insert($locations);
    }
}
