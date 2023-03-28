<?php
    $title = 'Кот занял первое место в Книге рекордов Гиннеса';
    $img_uri = './assets/images/новость1.jpg';

    echo "
    <div class='container my-5'>
        <div class='row justify-content-center'>
            <div class='col-9'>
                <div class='flex-column card mb-3' style='max-width: 1040px;'>
                    <div class='row g-0'>
                        <div class='col-md-4'>
                            <img src='$img_uri' class='img-fluid rounded-start'>
                        </div>
                        <div class='col-md-8'>
                            <div class='card-body'>
                                <h5 class='container card-title fs-4'><a href='news_1.html' class='text-decoration-none'>$title</a></h5>
                                <p class='card-text'>Котик по имени Мотимару стал самым популярным котом на YouTube.</p>
                                <p class='card-text'>Японский кот Мотимару шотландской породы набрал на видеохостинге более 600 миллионов просмотров, за
                                    что удостоен награды и занесен в книгу рекордов Гиннеса. Это самый просматриваемый на YouTube
                                    представитель кошачьих.</p>
                                <p class='card-text'><small class='text-muted'> 15.03.23</small></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    ";
?>

