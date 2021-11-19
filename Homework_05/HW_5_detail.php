<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homework 5</title>
    <style>
        img {
            max-width: 100%;
            max-height: 100%;
        }
    </style>
</head>
<body>
    <?php
    if ($_GET["id"]) {
        $bdconn = new mysqli("localhost", "homeworker","HW_testtask_01","phpbasic");
        
        if ($bdconn->connect_error) {
                echo "Чёта не пашет";
        }
        else {
            $selectedid = (int)$_GET["id"];
            $bdconn->query("UPDATE fotobank SET total_views = total_views + 1 WHERE id=$selectedid;");
            if ($galleryItem = $bdconn->query("SELECT * FROM fotobank WHERE id=$selectedid;")) {

                foreach ($galleryItem as $bigfoto) {
                    ?>
                    <h3>Просмотров картинки: <?php echo $bigfoto["total_views"] ?></h3>

                    <img src="<?php echo $bigfoto["foto_adress"].$bigfoto["foto_name"];?>">

                    <h3>Просмотров картинки: <?php echo $bigfoto["total_views"] ?></h3>
                    <?php
                }
                
            }
        }
    }

            

    $bdconn->close();


    ?>
</body>
</html>