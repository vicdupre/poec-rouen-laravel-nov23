<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', "Laravel App")</title>
    <link rel="stylesheet" href="/styles.css" />
</head>

<body>
    <header>
        <nav>
            <a href="{{ route('home') }}">Acceuil</a>
            <a href="{{ route('products') }}">Produits</a>
            <a href="{{ route('ingredients') }}">Ingrédients</a>
        </nav>
    </header>
    <main>
        @yield("content")
    </main>
</body>

</html>