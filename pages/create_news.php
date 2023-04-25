<?php require_once '../scripts/htmHeader.php'; ?>

<div class="container">
   <form action="../scripts/db/create_news_script.php" method="post" class="my-4" enctype="multipart/form-data">
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

<?php require_once '../scripts/htmFooter.php'; ?>