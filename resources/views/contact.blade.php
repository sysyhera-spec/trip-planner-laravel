@extends('layouts.main')

@section('title', 'Contact')

@section('content')
<h2 class="title">Contact</h2>

@if(session('status'))
    <div class="notification is-success">
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="/contact">
    @csrf

    <div class="field">
        <label class="label">Nom</label>
        <div class="control">
            <input class="input @error('name') is-danger @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="Votre nom">
        </div>
        @error('name')
            <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="field">
        <label class="label">Email</label>
        <div class="control">
            <input class="input @error('email') is-danger @enderror" type="email" name="email" value="{{ old('email') }}" placeholder="Votre email">
        </div>
        @error('email')
            <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="field">
        <label class="label">Message</label>
        <div class="control">
            <textarea class="textarea @error('message') is-danger @enderror" name="message" placeholder="Votre message">{{ old('message') }}</textarea>
        </div>
        @error('message')
            <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="control">
        <button class="button is-primary" type="submit">Envoyer</button>
    </div>
</form>
@endsection