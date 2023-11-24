<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Liste des recettes</h1>
                    <a href="{{ route('recettes.create') }}">
                        <button type="button">Ajouter une recette</button>
                    </a>
                    <ul>
                        @foreach ($recettes as $recette )
                        <li>{{ $recette->name }} {{$recette->display_time }} | {{ $recette->category->name }} |
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
            </div>
        </div>
    </div>
</x-app-layout>