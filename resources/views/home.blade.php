@extends('layouts/main')

@section('content')
    <!-- <h1>Bienvenue sur le Trip Planner</h1> 
    <p>Planifiez vos voyages facilement!</p> -->

    <div class="columns is-multiline">
    @foreach($trips as $trip)
        <div class="column is-4 mb-5">
            <div class="box">
                <h2 class="is-size-4 has-text-weight-bold">
                    <a href="/trips/{{ $trip->id }}">{{ $trip->title }}</a>
                </h2>

                @if($trip->description)
                    <p class="subtitle is-size-6 has-text-grey">{{ $trip->description }}</p>
                @endif

                <p class="subtitle is-size-7 has-text-grey">
                    Du {{ $trip->starts_at }} au {{ $trip->ends_at }}
                </p>

                <p class="subtitle is-size-7 has-text-grey">
                    {{ $trip->people_count }} personne(s)
                </p>
            </div>
        </div>
    @endforeach
</div>
@endsection