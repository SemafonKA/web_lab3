<?php

$conn = new mysqli("localhost", "root", "", "cute_cite_database");
if ($conn->connect_error) {
   die("Ошибка: " . $conn->connect_error);
}

if (!isset($_POST['change'])) {
   die('Скрипт запущен неверно');
}

if (!isset($_POST['id'])) {
   die('id не задан');
}
$id = intval($_POST['id']);

// Получаем старые результаты новости (для проверки, что изменилось)
$sql = "SELECT Title, Description, Text, YoutubeLink, ImgUri FROM news WHERE Id = ?;";
$sqlPrepaired = $conn->prepare($sql);
$sqlPrepaired->bind_param('i', $id);
$sqlPrepaired->execute();
$sqlPrepaired->bind_result($title, $description, $text, $youtubeLink, $imgUri);
$sqlPrepaired->fetch();
$sqlPrepaired->close();

// Если передано изображение, то
if (isset($_FILES['img'])) {
   // Загружаем новое
   $img = $_FILES['img'];
   $imgName = $_FILES['img']['name'];
   $imgTmpDest = $_FILES['img']['tmp_name'];
   $imgError = $_FILES['img']['error'];

   $imgExt = substr($imgName, strrpos($imgName, ".") + 1);

   $acceptableExt = ['jpg', 'jpeg', 'gif', 'png'];

   if (in_array($imgExt, $acceptableExt)) {
      if ($imgError === 0) {
         // удаляем прошлое изображение
         $imgUri = '../..' . $imgUri;
         if (file_exists($imgUri)) {
            unlink($imgUri);
         }

         // Загружаем новое
         $imgTrueName = uniqid('', true) . '.' . $imgExt;
         $imgDest = '../../assets/images/' . $imgTrueName;
         move_uploaded_file($imgTmpDest, $imgDest);
         $imgUri = '/assets/images/' . $imgTrueName;

         $sqlPrepaired->close();
      } else {
         die("Ошибка загрузки изображения на сервер" . $imgError);
      }
   }
}


// Получаем новые данные
$newTitle = $_POST['Title'];
$newDescription = $_POST['Description'];
$newText = $_POST['Text'];
$newYoutubeLink = $_POST['YoutubeLink'];

// Проверяем изменения и меняем новость
if ($newYoutubeLink === htmlentities($youtubeLink)) {
   $newYoutubeLink = $youtubeLink;
}


$sql = "UPDATE news SET Title = ?, Description = ?, Text = ?, YoutubeLink = ?, ImgUri = ? WHERE Id = ?;";
$sqlPrepaired = $conn->prepare($sql);

$sqlPrepaired->bind_param('sssssi', $newTitle, $newDescription, $newText, $newYoutubeLink, $ImgUri, $id);
$sqlPrepaired->execute();


header('Location: /pages/admin.php');
