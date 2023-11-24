<x-app-layout>
    <div class="container">
        <h1>Liste des recettes</h1>
        <a href="{{ route('recettes.create') }}">
            <button type="button">Ajouter une recette</button>
        </a>
        <ul>
            @foreach ($recettes as $recette )
            <li>{{ $recette->name }} {{$recette->time_to_prepare}} min | {{ $recette->category->name }} |
                @foreach ($recette->ingredients as $ingredient)
                {{ $ingredient->name }},
                @endforeach

                @auth
                @if (Auth::id() == $recette->user_id)
                <form action="{{ route('recettes.destroy',$recette->id ) }}" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit">Supprimer</button>
                </form>
                @endif
                @endauth
            </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>