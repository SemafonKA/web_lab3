<?php require_once '../scripts/htmHeader.php'; ?>

<div style='display: flex; flex-direction:column; height: 75vh; align-items:center; justify-content:center;'>
   <p style='max-width: 40vw; font-size:1.5em; text-align:center;'>
      <?php
      if (isset($_GET['message'])) {
         echo $_GET['message'];
      }
      ?>
   </p>
   <a href='./admin.php' class="btn btn-primary m-1">
      Вернуться назад
   </a>
</div>

<?php require_once '../scripts/htmFooter.php'; ?>