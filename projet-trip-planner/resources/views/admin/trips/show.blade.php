@extends('layouts.main')

@section('title', 'Détail du voyage')

@section('content')

<h1>{{ $trip->title }}</h1>
<p>{{ $trip->description }}</p>
<p>Du {{ $trip->starts_at }} au {{ $trip->ends_at }}</p>
<p>Nombre de personnes : {{ $trip->people_count }}</p>
<p>Créé par : {{ $trip->user->name }}</p>

<h2 class="mt-5">Destinations</h2>
<ul>
    @foreach($trip->destinations as $destination)
        <li>{{ $destination->name }} ({{ $destination->starts_at }} - {{ $destination->ends_at }})</li>
    @endforeach
</ul>

<h2 class="mt-5">Transports</h2>
<ul>
    @foreach($trip->transports as $transport)
        <li>{{ $transport->type }} - {{ $transport->pricing_type }} : {{ $transport->price }}€</li>
    @endforeach
</ul>

<a href="{{ route('trips.index') }}" class="button mt-4">Retour à la liste</a>

@endsection