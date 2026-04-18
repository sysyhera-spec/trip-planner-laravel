@extends('layouts.main')

@section('title', 'Administration des voyages')

@section('content')

<h1>Gestion des voyages</h1>

<a href="{{ route('trips.create') }}" class="button is-primary mb-4">Créer un nouveau voyage</a>

<table class="table is-fullwidth">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Utilisateur</th>
            <th>Début</th>
            <th>Fin</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($trips as $trip)
        <tr>
            <td>{{ $trip->id }}</td>
            <td>{{ $trip->title }}</td>
            <td>{{ $trip->user->name }}</td>
            <td>{{ $trip->starts_at }}</td>
            <td>{{ $trip->ends_at }}</td>
            <td>
                <a href="{{ route('trips.show', $trip) }}" class="button is-small">Voir</a>
                <a href="{{ route('trips.edit', $trip) }}" class="button is-small is-info">Modifier</a>
                <form action="{{ route('trips.destroy', $trip) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="button is-small is-danger" onclick="return confirm('Supprimer ce voyage ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection