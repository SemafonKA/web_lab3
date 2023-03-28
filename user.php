<?php
$name = "не определено";
$age = "не определен";
if (isset($_GET["name"])) {

    $name = $_GET["name"];
}
if (isset($_GET["age"])) {

    $age = $_GET["age"];
}
echo "Имя: $name <br> Возраст: $age";
