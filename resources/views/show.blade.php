@extends('layouts.main')

@section('title', $trip->title)
@section('meta_description', $trip->description ?? 'Détail du voyage')

@section('content')
<h1 class="title">{{ $trip->title }}</h1>
<p>{{ $trip->description }}</p>
<p>{{ $trip->starts_at }} → {{ $trip->ends_at }}</p>
<p>{{ $trip->people_count }} personne(s)</p>
<p><strong>Créé par :</strong> {{ $trip->user->name }}</p>

<h2 class="subtitle mt-5">Destinations</h2>
@if($trip->destinations->isEmpty())
    <p>Aucune destination pour ce voyage.</p>
@else
    @foreach($trip->destinations as $destination)
        <div class="box">
            <h3 class="is-size-5 has-text-weight-semibold">{{ $destination->name }}</h3>
            <p>
                {{ $destination->starts_at ?? 'Date non définie' }} → 
                {{ $destination->ends_at ?? 'Date non définie' }}
            </p>
        </div>
    @endforeach
@endif
@endsection