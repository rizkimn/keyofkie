<?php

use App\Models\Location;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $locations = Location::all();
    return view('homepage', compact('locations'));
});
