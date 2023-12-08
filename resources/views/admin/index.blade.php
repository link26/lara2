<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ Панель</title>
</head>
<body>
<h1>Добро пожаловать в Админ Панель</h1>
<!-- Дополнительное содержимое -->


<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>



</body>
</html>
