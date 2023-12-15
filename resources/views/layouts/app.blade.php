<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Default Title')</title>

    <style>
        .black-background {
            background-color: black;
            color: white; /* Для контраста текста */
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- Лайтбокс -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

</head>

<body class="antialiased">

<form action="{{ route('search') }}" method="GET">
    <input type="text" name="query" required/>
    <button type="submit">Поиск</button>
</form>

    <div class="black-background">
    @include('partials.header')

        <div class="container">
            @yield('content') <!-- Содержимое конкретной страницы -->
        </div>

    @include('partials.footer')
         <!-- Ссылки на JavaScript -->
    </div>
</body>
</html>
