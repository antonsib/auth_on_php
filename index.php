<?php
require_once __DIR__ . '/src/helpers.php';

checkGuest();
?>
<!DOCTYPE html>
<html lang="ru" data-theme="light">
<body>

<form class="card" action="src/actions/login.php" method="post">
    <h2>Вход</h2>

    <label for="email">
        Email
        <input
            type="text"
            id="email"
            name="email"
            placeholder="ivan@areaweb.su"
        >
    </label>

    <label for="password">
        Пароль
        <input
            type="password"
            id="password"
            name="password"
            placeholder="******"
        >
    </label>

    <button
        type="submit"
        id="submit"
    >Продолжить</button>
</form>

<p>У меня еще нет <a href="/register.php">аккаунта</a></p>

</body>
</html>