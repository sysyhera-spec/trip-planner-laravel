@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Modifier le voyage : {{ $trip->title }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.trips.update', $trip) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $trip->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $trip->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="starts_at">Date de début</label>
            <input type="date" name="starts_at" id="starts_at" class="form-control" value="{{ old('starts_at', $trip->starts_at) }}" required>
        </div>

        <div class="mb-3">
            <label for="ends_at">Date de fin</label>
            <input type="date" name="ends_at" id="ends_at" class="form-control" value="{{ old('ends_at', $trip->ends_at) }}" required>
        </div>

        <div class="mb-3">
            <label for="people_count">Nombre de personnes</label>
            <input type="number" name="people_count" id="people_count" class="form-control" value="{{ old('people_count', $trip->people_count) }}" min="1" required>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('admin.trips.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
