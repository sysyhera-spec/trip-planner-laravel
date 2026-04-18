<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::orderBy('starts_at', 'desc')->take(3)->get();    
        return view('trips', ['trips' => $trips]);
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
