<?php require_once '../scripts/htmHeader.php'; ?>

<?php
$id = 0;
// Проверяем на то, что id новости задан
if (isset($_GET['id'])) {
   $id = intval($_GET['id']);
} else { ?>
   <div style='display: flex; flex-direction:column; height: 75vh; align-items:center; justify-content:center;'>
      <p>Номер новости не был передан</p>
      <a href='./admin.php' class="btn btn-primary m-1">
         Вернуться назад
      </a>
   </div>
<?php
   die();
}

$conn = new mysqli("localhost", "root", "", "cute_cite_database");
if ($conn->connect_error) {
   die("Ошибка: " . $conn->connect_error);
}

// Получаем информацию о данной новости
$sql = 'SELECT * FROM news WHERE id = ?;';
$prepairedSql = $conn->prepare($sql);
$prepairedSql->bind_param('i', $id);
$prepairedSql->execute();
$prepairedSql->bind_result($id, $title, $description, $text, $imgUri, $date, $youtubeLink);

// Если новость не найдена
if (!$prepairedSql->fetch()) { ?>
   <div style='display: flex; flex-direction:column; height: 75vh; align-items:center; justify-content:center;'>
      <p>Новость с указанным номером не найдена</p>
      <a href='./admin.php' class="btn btn-primary m-1">
         Вернуться назад
      </a>
   </div>
<?php
}
?>

<div class="container">
   <form action="../scripts/db/update_news.php" method="post" class="my-4" enctype="multipart/form-data">
      <input type="hidden" name='id' value="<?php echo $id; ?>">
      <lable class="form-lable">Заголовок</lable>
      <input type="text" class="form-control bg-body-secondary" name="Title" value="<?php echo $title ?>" maxlength="256" required>
      <lable class="form-lable">Короткое описание</lable>
      <input type="text" class="form-control bg-body-secondary" name="Description" value="<?php echo $description ?>" maxlength="256" required>
      <lable class="form-lable">Изображение</lable>
      <?php
      // Если юзер захотел поменять изображение новости, то показываем поле загрузки
      if (isset($_GET['newImg'])) { ?>
         <input type="file" class="form-control bg-body-secondary" name="img" required>
      <?php
         // Иначе показываем ему эту картинку и кнопку замены
      } else { ?>
         <div class="container" style='text-align:center; width: 50%'>
            <img src='<?php echo $imgUri; ?>' class='img-thumbnail'>
            <a href="./news_editor_page.php?id=<?php echo $id; ?>&newImg=1" class='btn btn-primary mt-2'>Изменить изображение</a>
         </div>
      <?php
      }
      ?>
      <lable class="form-lable">Текст</lable>
      <textarea type="text" class="form-control bg-body-secondary" name="Text" rows="20" required><?php echo $text ?></textarea>
      <lable class="form-lable">Модуль ютуб плеера (необязательно)</lable>
      <input type="text" class="form-control bg-body-secondary" name="YoutubeLink" value="<?php echo htmlentities($youtubeLink); ?>" maxlength="256">
      <lable class="form-lable">Дата</lable>
      <input type="datetime" class="form-control bg-body-secondary" name="Date" value="<?php echo $date ?>" readonly>
      <input class="btn btn-success my-3" type="submit" value="Сохранить" name="change">
   </form>
</div>

<?php require_once '../scripts/htmFooter.php'; ?>