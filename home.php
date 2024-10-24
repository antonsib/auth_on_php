<?php
require_once __DIR__ . '/src/helpers.php';

checkAuth();

$userName = getUserName();
?>
<!DOCTYPE html>
<html lang="ru" data-theme="light">
<body>

<div class="card home">
    <h1>Привет,  <?php echo $userName ?> !</h1>
    <form action="src/actions/logout.php" method="post">
        <button role="button">Выйти из аккаунта</button>
    </form>
</div>
</body>
</html>