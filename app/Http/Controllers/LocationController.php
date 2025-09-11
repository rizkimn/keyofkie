<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::latest()->paginate(16);
        return view('dashboard.locations.index', compact('locations'));
    }

    public function create()
    {
        return view('dashboard.locations.create');
    }
}
