<?php require_once '../scripts/htmHeader.php'; ?>

<div id="viewport">
   <div class="login-card">
      <div class="login-card-header">
         Вход в аккаунт:
      </div>

      <div class="login-card-form">
         <form action="/scripts/login_script.php" method="post" enctype="multipart/form-data">
            <lable class="form-lable">Логин</lable>
            <input type="text" class="form-control mb-3" name="username" maxlength="256" required>
            <lable class="form-lable">Пароль</lable>
            <input type="text" class="form-control mb-3" name="password" maxlength="256" required>

            <input class="btn btn-primary" type="submit" value="Войти" name="login-btn">
         </form>
      </div>
      <?php
      if (isset($_GET['wusr'])) { ?>
         Пользователь не найден.
      <?php } ?>
   </div>
</div>

<?php require_once '../scripts/htmFooter.php'; ?>