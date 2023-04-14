<?php
$conn = new mysqli("localhost", "root", "", "cute_cite_database");
if ($conn->connect_error) {
   die("Ошибка: " . $conn->connect_error);
}

if (isset($_POST['delete-btn'])) {
   $sql = 'SELECT ImgUri FROM news WHERE Id = ?;';
   $sqlPrepaired = $conn->prepare($sql);

   $id = $_POST['id'];
   $sqlPrepaired->bind_param('i', $id);

   $sqlPrepaired->execute();
   $sqlPrepaired->bind_result($imgUri);
   $sqlPrepaired->fetch();

   $imgUri = '../..' . $imgUri;
   $sqlPrepaired->close();

   if (file_exists($imgUri)) {
      unlink($imgUri);
   }

   $sql = 'DELETE FROM news WHERE Id = ?;';
   $sqlPrepaired = $conn->prepare($sql);

   $sqlPrepaired->bind_param('i', $id);
   $sqlPrepaired->execute();
}
header('Location: /pages/delete_news_page.php');
die();
