<?php
session_start();
?>

<div class="container header">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <img src="/assets/icon.svg" height="32px" width="40" />
            <span class="fs-4"> Мир котиков </span>
        </a>

        <ul class="nav nav-pills d-flex justify-content-center">
            <li class="nav-item"><a href="/index.php" class="nav-link active" aria-current="page"> Главная </a></li>
            <?php
            if (isset($_SESSION['isLoggedIn'])) {
            ?>
                <li class="nav-item"><a href="/scripts/logout_script.php" class="nav-link"> Выйти </a></li>
            <?php
            } else {
            ?>
                <li class="nav-item"><a href="/pages/login_page.php" class="nav-link"> Войти </a></li>
            <?php
            };
            if (isset($_SESSION['isAdmin'])) {
            ?>
                <li class="nav-item"><a href="/pages/admin.php" class="nav-link"> Админка </a></li>
            <?php
            };
            ?>

            <li class="nav-item"><a href="/pages/contacts.php" class="nav-link"> Разработчики </a></li>
        </ul>
    </header>
</div>