@extends("layout.client")

@section('title', "Nouvelle catégorie")

@section("content")
<div class="container">
    <h1>Nouvelle catégorie</h1>
    @if (count($errors) > 0)
    <p>Erreur(s) :</p>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <label for="name">Nom :</label>
        <input id="name" name="name" type="text" required />
        <button type="submit">Enregister</button>
    </form>
</div>
@endsection