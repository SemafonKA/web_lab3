<!DOCTYPE html>
<html lang="ru">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">

   <title> Котики планеты Земля </title>
   <link href="style.css" type="text/css" rel="stylesheet" />
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
   <!--Заголовок-->
   <?php
   require "./scripts/header.php";
   ?>

   <!-- Карточки -->

   <?php
   require_once "scripts/news_card.php";

   $conn = new mysqli("localhost", "root", "", "cute_cite_database");
   if ($conn->connect_error) {
      die("Ошибка: " . $conn->connect_error);
   }

   $sqlRequest = 'SELECT Id, Title, ImgUri, Description, Date FROM news ORDER BY Date Desc;';
   if ($results = $conn->query($sqlRequest)) {
      $len = $results->num_rows;
      $num = 1;
      foreach ($results as $result) {
         $id = $result['Id'];
         $title = $result['Title'];
         $img_uri = $result['ImgUri'];
         $description = $result['Description'];
         $date = substr($result['Date'], 0, 10);
         $reverse = $num % 2 == 0 ? true : false;

         newsCard($id, $title, $img_uri, $description, $date, $reverse);

         $num ++;
         if ($num <= $len) {
            echo '<hr width="75%" style="margin: auto; margin-top: 30px;">';
         }
      }
   }
   ?>

   <!--Подвал-->
   <?php
   require_once "scripts/footer.php"
   ?>

</body>

</html>