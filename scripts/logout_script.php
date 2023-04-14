<?php
session_start();

unset($_SESSION['isLoggedIn'], $_SESSION['username'], $_SESSION['isAdmin']);

header('Location: /index.php');
die();
