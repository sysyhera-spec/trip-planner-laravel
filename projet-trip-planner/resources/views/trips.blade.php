@extends('layouts.main')

@section('title', 'Voyages')

@section('content')

<h2 class="title">Liste des voyages</h2>

<div class="columns is-multiline">

<div class="column is-4">
    <span><small>12 mar 2026 — 18 mar 2026</small></span>
    <h2 class="title is-4">Lisbonne</h2>
    <p>6 jours / 2 personnes</p>
    <p>Budget estimé : 750€</p>
</div>

<div class="column is-4">
    <span><small>02 avr 2026 — 10 avr 2026</small></span>
    <h2 class="title is-4">Tokyo</h2>
    <p>9 jours / 1 personne</p>
    <p>Budget estimé : 2200€</p>
</div>

<div class="column is-4">
    <span><small>15 mai 2026 — 22 mai 2026</small></span>
    <h2 class="title is-4">Reykjavik</h2>
    <p>8 jours / 4 personnes</p>
    <p>Budget estimé : 3400€</p>
</div>

</div>

@endsection