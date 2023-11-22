@extends("layout.client")
@section("title", "Mes produits")

@section("content")
<h1>{{ $name }}</h1>
@if ($name === "Toto")
<p>Je suis toto</p>
@endif
<x-button title="bonjour" />
<x-button />
<x-button />
<x-button />
<ol>
    @foreach ($products as $product )
    <li>{{$product}}</li>
    @endforeach
</ol>
@endsection