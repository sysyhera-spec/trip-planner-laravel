<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;

class TripController extends Controller
{
    public function index(Request $request)
    {
        $query = Trip::orderBy('starts_at', 'desc');

        if ($request->filled('q')) {
            $query->where('title', 'like', '%' . $request->q . '%');
        }

        $trips = $query->get();
        return view('trips.index', ['trips' => $trips]);
    }

     // Page /trips/{id} : détail d’un voyage + ses destinations
    public function show(Trip $trip)
    {
        $trip->load(
            'destinations.activities',
            'destinations.accommodations',
            'transports',
            'user'
        );

        return view('trips.show', compact('trip'));
    }
}
