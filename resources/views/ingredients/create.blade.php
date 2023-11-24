<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h1>Nouvel ingrédient</h1>
                    @if (count($errors) > 0)
                    <p>Erreur(s) :</p>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                    @endif
                    <form action="{{ route('ingredients.store') }}" method="post">
                        @csrf
                        <label for="name">Nom :</label>
                        <input id="name" name="name" type="text" required />
                        <button type="submit">Enregister</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>