@extends('layouts.main')

@section('content')

<h1>{{ $trip->title }}</h1>
<p>{{ $trip->description }}</p>
<p>{{ $trip->starts_at }} - {{ $trip->ends_at }}</p>

<h2>Destinations</h2>
@if($trip->destinations->count() > 0)
    <ul>
        @foreach($trip->destinations as $destination)
            <li>{{ $destination->name }} ({{ $destination->starts_at ?? '??' }} - {{ $destination->ends_at ?? '??' }})</li>
        @endforeach
    </ul>
@else
    <p>Aucune destination pour ce voyage.</p>
@endif

<h2 class="title is-4">Coût total du voyage</h2>

<p class="subtitle">
    {{ $trip->totalCost() }} €
</p>
@endsection