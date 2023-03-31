<?php

    function newsCard($id, $title, $imgUri, $description, $date, $reverse = false) {
        $rowParams = "";
        if ($reverse == true) {
            $rowParams = " flex-row-reverse ";
        }

        $refLink = "./page.php?Id=$id";

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
                                    <h5 class='container card-title fs-3'><a href='$refLink' class='text-decoration-none'>$title</a></h5>
                                    <p class='card-text fs-6'>$description</p>
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

