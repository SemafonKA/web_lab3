<?php
session_start();

if (isset($_POST['login-btn']) && isset($_POST['username']) && isset($_POST['password'])) {
   $conn = new mysqli("localhost", "root", "", "cute_cite_database");
   if ($conn->connect_error) {
      die("Ошибка: " . $conn->connect_error);
   }

   $username = $_POST['username'];
   $password = $_POST['password'];

   $sql = 'SELECT Permissions FROM users WHERE username = ? AND password = ?;';
   $prepaired = $conn->prepare($sql);

   $prepaired->bind_param('ss', $username, $password);
   $prepaired->execute();
   $prepaired->bind_result($permissions);

   if (!$prepaired->fetch()) {
      header('Location: ../pages/login_page.php?wusr=1');
      die('Ошибка - пользователь не найден');
   }

   $_SESSION['isLoggedIn'] = true;
   $_SESSION['username'] = $username;

   if ($permissions === 'root') {
      $_SESSION['isAdmin'] = true;
   }

   header('Location: /index.php');
   die();
} else {
   die('Запрос к скрипту выполнен неверно.');
}
