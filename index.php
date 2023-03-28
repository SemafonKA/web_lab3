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

   <!--Карусель-->

   <!-- <div class="container carusel">
    <div id="carouselExampleCaptions" class="carousel slide">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="картинка 3.jpg" class="d-block w-100">
          <div class="carousel-caption d-none d-md-block">
            <h5> Борис </h5>
            <p> Это кот Борис и он в отпуске </p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="картинка 4.jpg" class="d-block w-100">
          <div class="carousel-caption d-none d-md-block">
            <h5> Стелла </h5>
            <p> Это Стелла, победительница конкурса Мисс Грация 2023 </p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="Соня 2.jpg" class="d-block w-100">
          <div class="carousel-caption d-none d-md-block">
            <h5> Соня </h5>
            <p> Это Соня, просто красивая кошка главного разработчика сайта</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div> -->

   <hr width="75%" style="margin: auto; margin-top: 30px;">

   <?php require "./scripts/news_card.php"; ?>

   <!--Карточка 1-->

   <div class="container my-5">
      <div class="row justify-content-center">
         <div class="col-9">
            <div class="flex-column card mb-3" style="max-width: 1040px;">
               <div class="row g-0">
                  <div class="col-md-4">
                     <img src="./assets/images/новость1.jpg" class="img-fluid rounded-start">
                  </div>
                  <div class="col-md-8">
                     <div class="card-body">
                        <h5 class="container card-title fs-4"><a href="news_1.html" class="text-decoration-none">Кот занял первое место в Книге рекордов Гиннеса</a></h5>
                        <p class="card-text">Котик по имени Мотимару стал самым популярным котом на YouTube.</p>
                        <p class="card-text">Японский кот Мотимару шотландской породы набрал на видеохостинге более 600 миллионов просмотров, за
                           что удостоен награды и занесен в книгу рекордов Гиннеса. Это самый просматриваемый на YouTube
                           представитель кошачьих.</p>
                        <p class="card-text"><small class="text-muted"> 15.03.23</small></p>
                     </div>
                  </div>
               </div>
            </div>

         </div>
      </div>
   </div>

   <hr width="75%" style="margin: auto; margin-top: 30px;">

   <!--Карточка 2-->

   <div class="container my-5">
      <div class="row justify-content-center">
         <div class="col-9">
            <div class="flex-column card mb-3" style="max-width: 1040px;">
               <div class="row d-flex flex-row-reverse g-0"">
            <div class=" col-md-5">
                  <img src="./assets/images/новость2.jpg" class="img-fluid rounded-start">
               </div>
               <div class="col-md-7">
                  <div class="card-body">
                     <h5 class="container card-title fs-4"><a href="news_2.html" class="text-decoration-none"> Кот по кличке Семён наелся Китикета и не может встать</a></h5>
                     <p class="card-text"> В Новосибирске кот по кличке Семён парализовал движение на ул. Красный проспект в сторону городского
                        Аэропорта... </p>
                     <p class="card-text"><small class="text-muted">01.03.23</small></p>
                  </div>
               </div>
            </div>
         </div>

      </div>
   </div>
   </div>

   <hr width="75%" style="margin: auto; margin-top: 20px;">

   <!--Карточка 3-->

   <div class="container my-5">
      <div class="row justify-content-center">
         <div class="col-9">
            <div class="flex-column card mb-3" style="max-width: 1040px;">
               <div class="row g-0"">
              <div class=" col-md-4">
                  <img src="./assets/images/новость3.1.jpg" class="img-fluid rounded-start">
               </div>
               <div class="col-md-8">
                  <div class="card-body">
                     <h5 class="container card-title fs-4 "><a href="news_3.html" class="text-decoration-none"> В Барнауле одна компания официально трудоустроила кошку.</a></h5>
                     <p class="card-text">Всемирный день кошек обернулся для бенгальской красавицы повышением по службе...</p>
                     <p class="card-text"><small class="text-muted">31.02.23</small></p>
                  </div>
               </div>
            </div>
         </div>

      </div>
   </div>
   </div>

   <!--Подвал-->

   <?php
   require "./scripts/footer.php"
   ?>

</body>

</html>