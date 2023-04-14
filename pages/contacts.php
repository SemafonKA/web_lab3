<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="/style.css" type="text/css" rel="stylesheet">

    <title> Котики планеты Земля </title>

</head>

<body>
    <!--Заголовок-->
    <?php require_once '../scripts/header.php'; ?>

    <!-- Информация о разработчике 1 -->

    <div class="container-fluid about">
        <div class="row justify-content-center">
            <div class=" col-md-3 col-sm-10">
                <div class="container justify-content-center" style=" margin-right: 0px; margin-left: auto;">
                    <div class="container d-flex justify-content-center">
                        <img src="../assets/authors/фото Света.jpg" style="max-width: 70%;">
                    </div>
                    <div class="container d-flex justify-content-center mt-4">
                        <p> Web Developer</p>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-10 desc">
                <h3>
                    <font color="#3AC1EF">▍Будник Светлана</font>
                </h3>
                <p>
                    Студентка факультета прикладной математики и информатики, 3 курс
                </p>
            </div>
        </div>
    </div>

    <div class="container" style="height:40px"></div>
    <!-- Информация о разработчике 2 -->

    <div class="container-fluid about">
        <div class="row justify-content-center">
            <div class=" col-md-3 col-sm-10">
                <div class="container justify-content-center" style=" margin-right: 0px; margin-left: auto;">
                    <div class="container d-flex justify-content-center">
                        <img src="../assets/authors/фото Сёма.jpg" style="max-width: 70%;">
                    </div>
                    <div class="container d-flex justify-content-center mt-4">
                        <p> Technical assistant</p>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-10 desc">
                <h3>
                    <font color="#3AC1EF">▍Самсонов Семён</font>
                </h3>
                <p>
                    Студент факультета прикладной математики и информатики, 3 курс
                </p>
            </div>
        </div>
    </div>

    <!--Подвал-->

    <?php require_once '../scripts/footer.php'; ?>

</body>

</html>