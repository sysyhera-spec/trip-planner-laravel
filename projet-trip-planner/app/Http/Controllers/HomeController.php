<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;

class HomeController extends Controller
{
          public function index()
      {
            // Récupère les 3 derniers voyages par date de début décroissante
        $trips = Trip::orderBy('start_at', 'desc')->take(3)->get();

        // Passe les voyages à la vue home
        return view('home', ['trips' => $trips]);
      }
}
