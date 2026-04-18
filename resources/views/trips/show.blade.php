@extends('layouts.main')
@section('content')

<div class="box mb-5">
    <h1 class="title">{{ $trip->title }}</h1>
    @if($trip->description)
        <p class="subtitle has-text-grey">{{ $trip->description }}</p>
    @endif
    <p><strong>Du</strong> {{ $trip->starts_at }} <strong>au</strong> {{ $trip->ends_at }}</p>
    <p><strong>Personnes :</strong> {{ $trip->people_count }}</p>
    <p><strong>Créé par :</strong> {{ $trip->user->name ?? 'Anonyme' }}</p>
</div>

<h2 class="title is-4">Destinations</h2>
@forelse($trip->destinations as $destination)
    <div class="box mb-4">
        <h3 class="title is-5">{{ $destination->name }}</h3>
        <p class="has-text-grey">{{ $destination->starts_at ?? '??' }} → {{ $destination->ends_at ?? '??' }}</p>

        @if($destination->activities->count() > 0)
            <h4 class="title is-6 mt-3">Activités</h4>
            <ul>
                @foreach($destination->activities as $activity)
                    <li>{{ $activity->title }} — {{ $activity->price_per_person }}€/personne
                        @if($activity->duration_minutes)
                            ({{ $activity->duration_minutes }} min)
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif

        @if($destination->accommodations->count() > 0)
            <h4 class="title is-6 mt-3">Hébergements</h4>
            <ul>
                @foreach($destination->accommodations as $accommodation)
                    <li>{{ $accommodation->title }} — {{ $accommodation->nights }} nuit(s) à {{ $accommodation->price_per_night }}€/nuit</li>
                @endforeach
            </ul>
        @endif
    </div>
@empty
    <p>Aucune destination pour ce voyage.</p>
@endforelse

@if($trip->transports->count() > 0)
    <h2 class="title is-4">Transports</h2>
    <div class="box">
        <ul>
            @foreach($trip->transports as $transport)
                <li>{{ ucfirst($transport->type) }} —
                    @if($transport->pricing_type === 'per_person')
                        {{ $transport->price }}€/personne
                    @else
                        {{ $transport->price }}€ (forfait)
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box mt-5">
    <h2 class="title is-4">💰 Coût total du voyage</h2>
    <p class="is-size-3 has-text-weight-bold has-text-primary">{{ $trip->totalCost() }} €</p>
</div>

@endsection
