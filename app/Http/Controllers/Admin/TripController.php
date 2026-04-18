<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trip;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::all();
        return view('admin.trips.index', compact('trips'));
    }

    public function create()
    {
        return view('admin.trips.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'starts_at'    => 'required|date',
            'ends_at'      => 'required|date|after:starts_at',
            'people_count' => 'required|integer|min:1',
        ]);

        Trip::create([
            ...$request->only(['title', 'description', 'starts_at', 'ends_at', 'people_count']),
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('admin.trips.index')->with('success', 'Voyage créé avec succès !');
    }

    public function show(Trip $trip)
    {
        return view('admin.trips.show', compact('trip'));
    }

    public function edit(Trip $trip)
    {
        return view('admin.trips.edit', compact('trip'));
    }

    public function update(Request $request, Trip $trip)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'starts_at'    => 'required|date',
            'ends_at'      => 'required|date|after:starts_at',
            'people_count' => 'required|integer|min:1',
        ]);

        $trip->update($request->only(['title', 'description', 'starts_at', 'ends_at', 'people_count']));

        return redirect()->route('admin.trips.index')->with('success', 'Voyage mis à jour !');
    }

    public function destroy(Trip $trip)
    {
        $trip->delete();
        return redirect()->route('admin.trips.index')->with('success', 'Voyage supprimé !');
    }
}
