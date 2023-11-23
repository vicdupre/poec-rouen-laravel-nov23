@extends('layout.client')

@section("title", "Liste des recettes")

@section("content")

<div class="container">
    <h1>Liste des recettes</h1>
    <a href="{{ route('recettes.create') }}">
        <button type="button">Ajouter une recette</button>
    </a>
    <ul>
        @foreach ($recettes as $recette )
        <li>{{ $recette->name }} {{$recette->time_to_prepare}} min
            <form action="{{ route('recettes.destroy', $recette->id) }}" method="post">
                @csrf
                @method("DELETE")
                <button type="submit">Supprimer</button>
            </form>
        </li>
        @endforeach
    </ul>
</div>

@endsection