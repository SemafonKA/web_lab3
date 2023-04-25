<!DOCTYPE html>
<html lang="ru">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <link rel="stylesheet" type="text/css" href="slick/slick.css" />
   <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
   <link href="/style.css" type="text/css" rel="stylesheet">

   <title> Котики планеты Земля </title>
</head>

<?php
session_start();

// Подключаем базу данных
$conn = new mysqli("localhost", "root", "", "cute_cite_database");
if ($conn->connect_error) {
   die("Ошибка: " . $conn->connect_error);
}
?>

<body>

<?php require_once 'header.php'; ?>