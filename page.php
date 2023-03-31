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
    require './scripts/header.php';
    ?>

    <?php
    $conn = new mysqli("localhost", "root", "", "cute_cite_database");
    if ($conn->connect_error) {
        die("Ошибка: " . $conn->connect_error);
    }

    $id = 1;

    if (isset($_GET["Id"])) {
        $id = $_GET["Id"];
    }
    $sqlRequest = "SELECT * FROM news WHERE Id IN ($id);";
    if ($results = $conn->query($sqlRequest)) {
        if ($results->num_rows == 0) {
            die("Ошибка: новость не найдена...");
        }
        foreach ($results as $result) {
            $title = $result['Title'];
            $description = $result['Description'];
            $text = $result['Text'];
            $imgUri = $result['ImgUri'];
            $imgUri = "../$imgUri";
            $date = substr($result['Date'], 0, 10);
            $youtubeLink = $result['YoutubeLink'];

            echo "
            <div class='container news'>
        <div
            style='border-left:3px solid rgba(185, 205, 9, 0.815);border-right:3px solid rgba(185, 205, 9, 0.815); padding-left:10px; padding-right:10px; '>
            <p class='text-start fs-6 my-3'> $date</p>
            <p class='fw-semibold fs-3'> $title </p>
            <p class='lh-base fs-5'> $description </p>
            <div class='row'>
                <div class='col-md-5 col-sm-12'>
                    <img src='$imgUri' class='img-thumbnail'>
                </div>
                <div class='col-md-7 col-sm-12 fs-5'>
                  $text
                </div>
            </div>
            <div class='container'>
                <div class='row justify-content-center'>
                    <div class='col-9'>
                        <p>$youtubeLink</p>
                    </div>
                </div>
                <div style='border-top:3px solid rgba(185, 205, 9, 0.815); padding-left:10px; padding-right:10px; '>
                </div>

            </div>

        </div>

    </div>

    </div>
            ";
        }
    }
    ?>

    <!--Подвал-->
    <?php
    require './scripts/footer.php';
    ?>

</body>

</html>