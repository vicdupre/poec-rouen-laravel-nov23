<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h1>Liste des catégories</h1>
                    <a href="{{ route('categories.create') }}">
                        <button type="button">Ajouter une catégorie</button>
                    </a>
                    <ul>
                        @foreach ($categories as $category )
                        <li>{{ $category->name }}
                            <form action="{{ route('categories.destroy', $category->id) }}" method="post">
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