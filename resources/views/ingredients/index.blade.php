<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

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
            </div>
        </div>
    </div>
</x-app-layout>