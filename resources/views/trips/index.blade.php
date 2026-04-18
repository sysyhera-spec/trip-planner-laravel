@extends('layouts.main')
@section('title', 'Voyages')
@section('content')
<h1 class="title">Tous les voyages</h1>

@if(request('q'))
    <p class="has-text-grey mb-4">Résultats pour : <strong>{{ request('q') }}</strong></p>
@endif

<div class="columns is-multiline">
    @forelse($trips as $trip)
        <div class="column is-4 mb-5">
            <div class="box">
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
        </div>
    @empty
        <div class="column is-12">
            <p class="has-text-grey">Aucun voyage trouvé pour "{{ request('q') }}".</p>
        </div>
    @endforelse
</div>
@endsection