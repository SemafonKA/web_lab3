<!DOCTYPE html>
<html lang="ru">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

   <link href="style.css" type="text/css" rel="stylesheet" />

   <title> Котики планеты Земля </title>
</head>

<body >
   <?php 
      require_once 'scripts/header.php';
   ?>

   <div class="container">
      <form action="./scripts/db/push_news.php" method="post" class="my-4" enctype="multipart/form-data">
         <lable class="form-lable">Заголовок</lable>
         <input type="text" class="form-control bg-body-secondary" name="Title" maxlength="256" required>
         <lable class="form-lable">Короткое описание</lable>
         <input type="text" class="form-control bg-body-secondary" name="Description" maxlength="256" required>
         <lable class="form-lable">Изображение</lable>
         <input type="file" class="form-control bg-body-secondary" name="img" required>
         <lable class="form-lable">Текст</lable>
         <textarea type="text" class="form-control bg-body-secondary" name="Text" rows="20" required></textarea>
         <lable class="form-lable">Модуль ютуб плеера (необязательно)</lable>
         <input type="text" class="form-control bg-body-secondary" name="YoutubeLink" maxlength="256">
         <lable class="form-lable">Дата</lable>
         <input type="datetime" class="form-control bg-body-secondary" name="Date" value="<?php echo date("Y-m-d H:i:s"); ?>" readonly>
         <input class="btn btn-success my-3" type="submit" value="Сохранить" name="add">
      </form>
   </div>

   <?php
      require_once 'scripts/footer.php';
   ?>
</body>

</html>