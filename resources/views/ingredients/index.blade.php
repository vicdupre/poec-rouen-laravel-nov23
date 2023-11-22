@extends('layout.client')

@section("title", "Liste des ingrédients")

@section("content")

<div class="container">
    <h1>Liste des ingrédients</h1>
    <ul>
        @foreach ($ingredients as $ingredient )
        <li>{{ $ingredient->name }}</li>
        @endforeach
    </ul>
</div>

@endsection