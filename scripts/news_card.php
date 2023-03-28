<?php

    function newsCard($title, $imgUri, $description, $text, $date, $reverse = false) {
        $rowParams = "";
        if ($reverse == true) {
            $rowParams = " flex-row-reverse ";
        }
        echo "
        <div class='container my-5'>
            <div class='row justify-content-center'>
                <div class='col-9'>
                    <div class='flex-column card mb-3' style='max-width: 1040px;'>
                        <div class='row g-0 d-flex $rowParams'>
                            <div class='col-md-4'>
                                <img src='$imgUri' class='img-fluid rounded-start'>
                            </div>
                            <div class='col-md-8'>
                                <div class='card-body'>
                                    <h5 class='container card-title fs-4'><a href='news_1.html' class='text-decoration-none'>$title</a></h5>
                                    <p class='card-text'>$description</p>
                                    <p class='card-text'>$text</p>
                                    <p class='card-text'><small class='text-muted'>$date</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
        ";
    }

?>

