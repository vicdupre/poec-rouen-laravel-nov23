<x-app-layout>
    <div class="container">
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
</x-app-layout>