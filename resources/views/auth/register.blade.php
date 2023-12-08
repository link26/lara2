<form method="POST" action="{{ route('register') }}">
@csrf
<!-- Поле для имени -->
    <input type="text" name="name" placeholder="Name" required>

    <!-- Поле для электронной почты -->
    <input type="email" name="email" placeholder="Email" required>

    <!-- Поле для пароля -->
    <input type="password" name="password" placeholder="Password" required>

    <!-- Поле для подтверждения пароля -->
    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

    <!-- Кнопка для отправки формы -->
    <button type="submit">Register</button>
</form>
