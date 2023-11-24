<x-app-layout>
    <div class="container">
        <h1>Nouvelle recette</h1>
        @if (count($errors) > 0)
        <p>Erreur(s) :</p>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
        <form action="{{ route('recettes.store') }}" method="post">
            @csrf
            <label for="name">Nom :</label>
            <input id="name" name="name" type="text" required />
            <label for="difficulty">Difficulté :</label>
            <select id="difficulty" name="difficulty" required>
                <option value="0">Très facile</option>
                <option value="1">Facile</option>
                <option value="2">Moyen</option>
                <option value="3">Difficile</option>
                <option value="4">Très difficile</option>
            </select>
            <label for="time_to_prepare">Temps de préparation :</label>
            <input id="time_to_prepare" name="time_to_prepare" type="number" required />
            <label for="category_id">Catégorie :</label>
            <select id="category_id" name="category_id">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <p>Ingrédients</p>
            @foreach ($ingredients as $ingredient)
            <div>
                <input type="checkbox" id="ingredient-{{ $ingredient->id }}" name="ingredients[]" value="{{$ingredient->id}}" />
                <label for="ingredient-{{ $ingredient->id }}">{{$ingredient->name}}</label>
            </div>
            @endforeach

            <button type="submit">Enregister</button>
        </form>
    </div>
</x-app-layout>