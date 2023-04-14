<!DOCTYPE html>
<html lang="ru">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
   <link href="/style.css" type="text/css" rel="stylesheet" />
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

   <style>
      #viewport {
         display: flex;
         flex-direction: column;
         height: 75vh;
         align-items: center;
         justify-content: center;
      }

      .login-card {
         display: flex;
         flex-direction: column;
         align-items: center;
         justify-content: center;
         text-align: center;
         border: 1px solid black;
         border-radius: 15px;
         padding: 2em 2em 1em 2em;
         background-color: #e7ebada6;
      }

      .login-card-header {
         font-size: 1.5em;
         margin-bottom: 1em;
      }

      .login-card-form {
         font-size: 1.2em;
         margin: 10px 0px;
      }

      .login-card-form input.form-control {
         background-color: #ffffff80;
      }
   </style>

   <title> Котики планеты Земля </title>
</head>

<body>
   <?php
   require_once '../scripts/header.php';
   ?>

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


   <?php
   require_once '../scripts/footer.php';
   ?>
</body>

</html>