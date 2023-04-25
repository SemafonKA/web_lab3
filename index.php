<?php require_once 'scripts/htmHeader.php'; ?>

<!-- Карусель новостей -->
<?php
$sql = 'SELECT Id, Title, ImgUri, Description, Date FROM news ORDER BY Date Desc LIMIT 3  ;';
$prepairedSql = $conn->prepare($sql);
$prepairedSql->execute();
$prepairedSql->bind_result($id, $title, $imgUri, $desc, $date);
?>

<div class="container container-slider">
   <div class="slider">
      <?php while ($prepairedSql->fetch()) : ?>
         <div>
            <div class="row">
               <div class="card p-2">
                  <p class="fst-italic text-end">
                     <?= $date = substr($date, 0, 10); ?>
                  </p>
                  <h5 class="card-title">
                     <?= $title ?>
                  </h5>
                  <img src='<?= $imgUri ?>' class="card-img-top">
                  <div class="card-body">
                     <p class="card-text">
                        <?= $desc ?>
                     </p>
                     <a href="/pages/page.php?Id=<?= $id ?>" class="btn btn-primary mb-1">Подробнее</a>
                  </div>
               </div>
            </div>
         </div>
      <?php endwhile;
      $prepairedSql->close(); ?>
   </div>
</div>

<script src="jquery-3.6.4.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>

<script>
   $(document).ready(function() {
      $('.slider').slick({
         infinite: true,
         dots: true,
         autoplay: true,
         useTransform: false,
         autoplaySpeed: 5000,
      });
   });
</script>

<!-- Карточки -->
<?php
require_once "scripts/news_card.php";


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
$sqlRequest = "SELECT Id, Title, ImgUri, Description, Date FROM news ORDER BY Date Desc LIMIT $firstNews, $newsOnPage;";
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

      $num++;
      if ($num <= $len) {
         echo '<hr width="75%" style="margin: auto; margin-top: 30px;">';
      }
   }
}
?>

<!-- Вывод селектора страниц -->
<div class="page-selector-area">
   <?php
   // $currentPage - номер текущей страницы
   // $countPages  - число страниц
   $maxNumOfLinks = 7; // максимальное число ссылок в селекторе
   $numOfLinks = 0;
   // Выводим стрелочку назад
   if ($currentPage != 0) { ?>
      <a class='page-selector-item' href='/index.php?page=<?php echo $currentPage - 1; ?>'> &lt </a>
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
         <a class="page-selector-item" href='/index.php?page=<?php echo $i ?>'> <?php echo $i + 1; ?> </a>
      <?php
      }
   }

   // Выводим стрелочку вправо
   if ($currentPage != $countPages - 1) { ?>
      <a class='page-selector-item' href='/index.php?page=<?php echo $currentPage + 1; ?>'> &gt </a>
   <?php
   }
   ?>
</div>

<?php require_once './scripts/htmFooter.php' ?>