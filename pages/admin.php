<?php
require_once '../scripts/htmHeader.php';

// Ограничиваем число новостей на одной странице как 3
$newsOnPage = 3;

// Получаем число новостей для отображения номеров страниц снизу
$sqlRequest = 'SELECT COUNT(*) FROM news;';
$countNews = $conn->query($sqlRequest)->fetch_assoc()['COUNT(*)'];

// Получаем число новостных страниц
$countPages = intdiv($countNews + $newsOnPage - 1, $newsOnPage);

// Определяем текущую страницу
$currentPage = 0;
if (isset($_GET['page'])) {
   $currentPage = intval($_GET['page']);
} else {
   $_GET['page'] = $currentPage;
}
// Триммируем номер страницы, если кто-то решил поиграться
if ($currentPage < 0) {
   $currentPage = 0;
}
if ($currentPage >= $countPages) {
   $currentPage = $countPages - 1;
}

// Получаем номер текущей новости
$firstNews = $currentPage * $newsOnPage;

// Получаем список новостей и выводим их на страницу
$sqlRequest = "SELECT * FROM news ORDER BY Date Desc LIMIT $firstNews, $newsOnPage;";

$result = $conn->query($sqlRequest);
if (!$result) {
   die("Ошибка: нет данных в базе данных.");
}
?>

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
                     <th>Действия</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($result as $row) { ?>
                     <tr>
                        <td style="text-align: center;">
                           <?php
                           $id = htmlspecialchars($row["Id"]);
                           echo "$id";
                           ?>
                        </td>
                        <td>
                           <?php
                           $title = htmlspecialchars($row["Title"]);
                           echo "$title";
                           ?>
                        </td>
                        <td>
                           <?php
                           $desc = htmlspecialchars($row["Description"]);
                           echo "$desc";
                           ?>
                        </td>
                        <td>
                           <?php $imgUri = htmlspecialchars($row["ImgUri"]);
                           $img = substr($imgUri, strrpos($imgUri, '/') + 1);
                           echo "$img";
                           ?>
                        </td>
                        <td>
                           <?php
                           $text = htmlspecialchars($row["Text"]);
                           echo "$text";
                           ?>
                        </td>
                        <td>
                           <?php
                           $date = htmlspecialchars($row["Date"]);
                           echo "$date";
                           ?>
                        </td>
                        <td>
                           <?php
                           $ulink = htmlspecialchars($row["YoutubeLink"]);
                           echo "$ulink";
                           ?>
                        </td>
                        <td style="text-align: center;">
                           <a href="./news_editor_page.php?id=<?= $row["Id"] ?>" class="btn btn-primary m-1">Редактировать</a>
                           <form action="/scripts/db/delete_news.php" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="id" value="<?= $row["Id"] ?>">
                              <input type="submit" name="delete-btn" value="Удалить" class="btn btn-danger m-1" onclick="return confirm('Вы уверены, что хотите удалить эту запись?')">
                           </form>
                        </td>
                     </tr>
                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>

   <!-- Вывод селектора страниц -->
   <div class="page-selector-area">
      <?php
      // $currentPage - номер текущей страницы
      // $countPages  - число страниц
      $maxNumOfLinks = 7; // максимальное число ссылок в селекторе

      $numOfLinks = 0;
      // Выводим стрелочку назад
      if ($currentPage != 0) { ?>
         <a class='page-selector-item' href='?page=<?php echo $currentPage - 1; ?>'> &lt </a>
         <?php
         $numOfLinks += 1;
      }

      // Сразу делаем заметку, что нужна правая стрелочка
      if ($currentPage != $countPages - 1) {
         $numOfLinks += 1;
      }

      // Определяем количество оставшихся для вывода ссылок
      $avaliableNumOfLinks = $maxNumOfLinks - $numOfLinks;
      // Определяем индексы начала и конца
      $beginIndex = $currentPage - intdiv($avaliableNumOfLinks, 2);
      $endIndex = $currentPage + ($avaliableNumOfLinks - intdiv($avaliableNumOfLinks, 2));

      // Если мы стоим в начале списка, урезаем индексы
      if ($beginIndex < 0) {
         $beginIndex = 0;
         $endIndex = $avaliableNumOfLinks;
         if ($endIndex >= $countPages) {
            $endIndex = $countPages;
         }
      }

      // Если мы стоим в конце списка, урезаем индексы
      if ($endIndex >= $countPages) {
         $endIndex = $countPages;
         $beginIndex = $endIndex - $avaliableNumOfLinks;
         if ($beginIndex < 0) {
            $beginIndex = 0;
         }
      }

      // Выводим ссылки
      for ($i = $beginIndex; $i < $endIndex; $i++) {
         if ($i == $currentPage) { ?>
            <a class="page-selector-item current"> <?php echo $i + 1; ?> </a>
         <?php
         } else { ?>
            <a class="page-selector-item" href='?page=<?php echo $i ?>'> <?php echo $i + 1; ?> </a>
         <?php
         }
      }

      // Выводим стрелочку вправо
      if ($currentPage != $countPages - 1) { ?>
         <a class='page-selector-item' href='?page=<?php echo $currentPage + 1; ?>'> &gt </a>
      <?php
      }
      ?>
   </div>
</div>

<?php require_once '../scripts/htmFooter.php'; ?>