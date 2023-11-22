@extends('layout.client')

@section("title", "Liste des ingrédients")

@section("content")

<div class="container">
    <h1>Liste des ingrédients</h1>
    <a href="{{ route('ingredients.create') }}">
        <button type="button">Ajouter un ingrédient</button>
    </a>
    <ul>
        @foreach ($ingredients as $ingredient )
        <li>{{ $ingredient->name }}
            <form action="{{ route('ingredients.destroy', $ingredient->id) }}" method="post">
                @csrf
                @method("DELETE")
                <button type="submit">Supprimer</button>
            </form>
        </li>
        @endforeach
    </ul>
</div>

@endsection