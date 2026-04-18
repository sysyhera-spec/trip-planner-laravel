@extends('layouts.main')

@section('content')

<h1 class="title">Tous les voyages</h1>

<div class="columns is-multiline">
    @foreach($trips as $trip)
        <div class="column is-4 mb-5">
            <h2 class="is-size-4 has-text-weight-bold">
                <a href="{{ route('trips.show', $trip->id) }}">{{ $trip->title }}</a>
            </h2>
            <p class="subtitle has-text-grey">
                {{ $trip->starts_at }} à {{ $trip->ends_at }} — {{ $trip->people_count }} personne(s)
            </p>
            <p class="subtitle has-text-grey">
                Par {{ $trip->user->name ?? 'Anonyme' }}
            </p>
        </div>
    @endforeach
</div>

@endsection