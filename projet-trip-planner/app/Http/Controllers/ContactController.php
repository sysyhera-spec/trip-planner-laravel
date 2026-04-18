<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    // Traite l'envoi du formulaire
    public function store(Request $request)
    {
        // Validation des données
        request()->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string',
        ]);

        // Enregistrement en base
        Contact::create(request(['name','email','message']));

        // Redirection avec message de succès
        return redirect('/contact')->with('status', 'Votre message a été envoyé !');
    }
}
