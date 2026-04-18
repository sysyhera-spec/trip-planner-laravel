@extends('layouts.main')

@section('title', 'Voyages')

@section('content')
<h1 class="title">Liste des voyages</h1>

<div class="columns is-multiline">
@foreach($trips as $trip)
    <div class="column is-4 mb-5">
        <h2 class="is-size-4 has-text-weight-bold">
            <a href="/trips/{{ $trip->id }}">{{ $trip->title }}</a>
        </h2>
        <p class="subtitle has-text-grey">
            {{ $trip->starts_at }} → {{ $trip->ends_at }} | {{ $trip->people_count }} personne(s)
        </p>
    </div>
@endforeach
</div>
@endsection