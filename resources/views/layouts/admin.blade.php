<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Административная Панель в папке до админа</title>
    <!-- Сюда можно добавить ссылки на стили и скрипты -->
    
</head>
<body>
<header>
    <!-- Здесь может быть ваша административная навигация -->

</header>

<a href="/admin/">Главная</a>
<a href="/admin/news">Новости</a>
<a href="/admin/categories">Каталог</a>
<a href="/admin/pages">Страницы</a>
<br><br>

<main>
    @yield('content')
</main>

<footer>
    <!-- Футер административной панели -->
    <br><br>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</footer>
</body>
</html>
