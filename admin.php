<!DOCTYPE html>
<html lang="ru">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">

   <title> Котики планеты Земля </title>
   <link href="style.css" type="text/css" rel="stylesheet" />
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

   <style>

   </style>

</head>

<body>
   <?php
   $conn = new mysqli("localhost", "root", "", "cute_cite_database");
   if ($conn->connect_error) {
      die("Ошибка: " . $conn->connect_error);
   }

   $sqlRequest = 'SELECT * FROM news ORDER BY Date Desc;';
   $result = $conn->query($sqlRequest);
   if (!$result) {
      die("Ошибка: нет данных в базе данных.");
   }
   ?>

   <?php require_once 'scripts/header.php'; ?>

   <div class="container">

      <div class="container">
         <div class="row mb-5">
            <div class="col-12">
               <a href="create_news.php" class="btn btn-success w-100">Добавить новость</a>
            </div>
         </div>
         <div class="row">
            <div class="col-12">
               <table class="table table-bordered table-striped table-hover w-100">
                  <thead>
                     <tr>
                        <th>id</th>
                        <th>Заголовок</th>
                        <th>Описание</th>
                        <th>Фото</th>
                        <th>Текст</th>
                        <th>Дата</th>
                        <th>youtube-ссылка</th>
                        <th>actions</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($result as $row) { ?>
                        <tr>
                           <td><?php $id = htmlspecialchars($row["Id"]);
                                 echo "$id"; ?></td>
                           <td><?php $title = htmlspecialchars($row["Title"]);
                                 echo "$title"; ?></td>
                           <td><?php $desc = htmlspecialchars($row["Description"]);
                                 echo "$desc"; ?></td>
                           <td><?php $imgUri = htmlspecialchars($row["ImgUri"]);
                                 $img = substr($imgUri, strrpos($imgUri, '/') + 1);
                                 echo "$img"; ?></td>
                           <td><?php $text = htmlspecialchars($row["Text"]);
                                 echo "$text"; ?></td>
                           <td><?php $date = htmlspecialchars($row["Date"]);
                                 echo "$date"; ?></td>
                           <td><?php $ulink = htmlspecialchars($row["YoutubeLink"]);
                                 echo "$ulink"; ?></td>
                           <td>
                              <a href="update.php?id=<?= $row["Id"] ?>" class="btn btn-primary m-1">Редактировать</a>
                              <form action="db/delete-action.php" method="post">
                                 <input type="hidden" name="id" value="<?=
                                                                        $row["Id"] ?>">
                                 <input type="submit" value="Удалить" class="btn btn-danger m-1">
                              </form>
                           </td>
                        </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>

   </div>
</body>

</html>