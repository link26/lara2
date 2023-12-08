<!DOCTYPE html>
<html>
<head>
    <title>Доступ Запрещен</title>
    <!-- Здесь может быть подключение стилей -->
</head>
<body>
<h1>Доступ Запрещен</h1>
<p>Извините, у вас нет прав администратора для доступа к этой странице.</p>
<!-- Здесь могут быть другие элементы страницы -->

<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>


</body>
</html>
