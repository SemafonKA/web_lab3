<?php
$conn = new mysqli("localhost", "root", "", "cute_cite_database");
if ($conn->connect_error) {
   die("Ошибка: " . $conn->connect_error);
}

if (isset($_POST['add'])) {
   $img = $_FILES['img'];
   $imgName = $_FILES['img']['name'];
   $imgTmpDest = $_FILES['img']['tmp_name'];
   $imgError = $_FILES['img']['error'];

   $imgExt = substr($imgName, strrpos($imgName, ".") + 1);

   $acceptableExt = ['jpg', 'jpeg', 'gif', 'png'];

   if (in_array($imgExt, $acceptableExt)) {
      if ($imgError === 0) {
         $imgTrueName = uniqid('', true) . '.' . $imgExt;
         $imgDest = '../../assets/images/' . $imgTrueName;
         move_uploaded_file($imgTmpDest, $imgDest);
         $imgDest = '/assets/images/' . $imgTrueName;
      } else {
         header('Location: /pages/template_admin_notify.php?message=' . "Ошибка загрузки изображения на сервер: " . $imgError);
      }
   }

   $sql = "INSERT INTO news (Title, Description, Text, ImgUri, Date, YoutubeLink)
               VALUES (?, ?, ?, ?, ?, ?);";
   $sqlPrepaired = $conn->prepare($sql);

   $title = $_POST['Title'];
   $desc = $_POST['Description'];
   $text = $_POST['Text'];
   $date = $_POST['Date'];
   $ulink = '';
   if (isset($_POST['YoutubeLink'])) {
      $ulink = $_POST['YoutubeLink'];
   }

   $sqlPrepaired->bind_param('ssssss', $title, $desc, $text, $imgDest, $date, $ulink);
   $sqlPrepaired->execute();

   header('Location: /pages/template_admin_notify.php?message=' . "Новость успешно опубликована");
   die();
}


header('Location: /pages/template_admin_notify.php?message=' . "Ошибка исполнения скрипта");