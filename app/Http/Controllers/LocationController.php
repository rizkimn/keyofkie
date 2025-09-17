<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::latest()->paginate(16);
        return view('dashboard.locations.index', compact('locations'));
    }

    public function show(Location $location)
    {
        $stats = $location->socialPosts()
            ->stats()
            ->first();

        return view('dashboard.locations.detail', compact(['location', 'stats']));
    }

    public function create()
    {
        return view('dashboard.locations.create');
    }

    /**
     * Store a newly created location.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'category'    => 'nullable|string|max:100',
            'latitude'    => 'nullable|numeric|between:-90,90',
            'longitude'   => 'nullable|numeric|between:-180,180',
        ]);

        // Siapkan data dasar
        $data = [
            'name'        => $validated['name'],
            'description' => $validated['description'] ?? null,
            'category'    => $validated['category'] ?? null,
            'latitude'    => $validated['latitude'] ?? null,
            'longitude'   => $validated['longitude'] ?? null,
            'popularity_score' => 0,
        ];

        // Jika lat-long ada, buat geometry point (PostGIS)
        if (!empty($validated['latitude']) && !empty($validated['longitude'])) {
            $data['geom'] = DB::raw("ST_SetSRID(ST_MakePoint({$validated['longitude']}, {$validated['latitude']}), 4326)");
        }

        Location::create($data);

        return redirect()
            ->route('dashboard.locations.index')
            ->with('success', 'Tempat wisata berhasil ditambahkan!');
    }
}
