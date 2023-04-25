<?php
require_once '../scripts/htmHeader.php';

$id = 1;

if (isset($_GET["Id"])) {
    $id = intval($_GET["Id"]);
}
$sqlRequest = "SELECT * FROM news WHERE Id=$id;";
$result = $conn->query($sqlRequest);
if (!$result) {
    die('Ошибка: новость не найдена...');
}

$result = $result->fetch_assoc();

$title = $result['Title'];
$description = $result['Description'];
$text = $result['Text'];
$imgUri = $result['ImgUri'];
$imgUri = "../$imgUri";
$date = substr($result['Date'], 0, 10);
$youtubeLink = $result['YoutubeLink'];
?>

<div class='container news'>
    <div style='border-left:3px solid rgba(185, 205, 9, 0.815);border-right:3px solid rgba(185, 205, 9, 0.815); padding-left:10px; padding-right:10px; '>
        <p class='text-start fs-6 my-3'><?php echo $date; ?></p>
        <p class='fw-semibold fs-3'> <?php echo $title; ?> </p>
        <p class='lh-base fs-5'> <?php echo $description; ?> </p>
        <div class='row'>
            <div class='col-md-7 col-sm-12'>
                <img src='<?php echo $imgUri; ?>' class='img-thumbnail'>
            </div>
            <div class='col-md-10 col-sm-12 fs-5 mx-auto my-5'>
                <?php echo $text; ?>
            </div>
            <?php
            if ($youtubeLink !== "") { ?>
                <div class='col-md-9 col-sm-12 mx-auto'>
                    <iframe frameborder="0" allowfullscreen="" src="<?php echo $youtubeLink; ?>"></iframe>
                </div>
            <?php } ?>
        </div>
        <div class='container'>
            <div style='border-top:3px solid rgba(185, 205, 9, 0.815); padding-left:10px; padding-right:10px; '>
            </div>
        </div>
    </div>
</div>
</div>

<?php require_once '../scripts/htmFooter.php'; ?>