<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homework 5</title>
    <style>
        .wrapper {
            width: 1140px;
            margin: 0 auto;
        }

        .gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .gallery img {
            width: 300px;
        }

        .modal-window {
            position: fixed;
            width:100%;
            height:100%;
            background-color:rgba(0,0,0,0.8);
            top:0;
            bottom:0;
            right:0;
            left:0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-window img {
            max-width: 100%;
            max-height: 100%;
            background-color: white;
        }

    </style>
</head>

<body>
    <div class="wrapper">
        <div class="task">
            <h2>
                1. Создать галерею изображений, состоящую из двух страниц: <br>
                просмотр всех фотографий (уменьшенных копий);<br>
                просмотр конкретной фотографии (изображение оригинального размера) по ее ID в базе данных.
            </h2>
            <h2>
                2. В базе данных создать таблицу, в которой будет храниться информация о картинках (адрес на сервере, размер, имя).
            </h2>
            <p>CREATE DATABASE IF NOT EXISTS phpbasic;
USE phpbasic;
CREATE TABLE IF NOT EXISTS fotobank (
	id SERIAL PRIMARY KEY,
	foto_adress VARCHAR(250),
	foto_size INT,
	foto_name VARCHAR(50),
	total_views INT DEFAULT 0
);

INSERT INTO fotobank (foto_adress, foto_size, foto_name)
VALUES 
('./illustrations/', 400, '001_desert_icons.png'),
('./illustrations/', 400, '002_coffee.png'),
('./illustrations/', 300, '003_cups_icons.png'),
('./illustrations/',500,'004_women_icons_Монтажная область 1.png'),
('./illustrations/',400,'005_girl_with_gift.png'),
('./illustrations/',600,'006_cat_icons.png');

CREATE USER homeworker IDENTIFIED BY 'HW_testtask_01';
GRANT SELECT, INSERT, UPDATE 
ON fotobank
TO homeworker;</p>
            <h2>
                3. *На странице просмотра фотографии полного размера под картинкой должно быть указано число ее
                просмотров.
            </h2>

            <h2>
                4. *На странице просмотра галереи список фотографий должен быть отсортирован по популярности.
                Популярность = число
                кликов по фотографии.
            </h2>
            
            <div class="gallery">
            <?php

            $bdconn = new mysqli("localhost", "homeworker","HW_testtask_01","phpbasic");
            if ($bdconn->connect_error) {
                echo "Чёта не пашет";
            }

            if ($galleryBase = $bdconn->query("SELECT id, foto_adress, foto_name FROM fotobank ORDER BY total_views DESC")) {
                foreach ($galleryBase as $galleryItem) {
                    ?>
                    <a href="./HW_5_detail.php?id=<?php echo $galleryItem["id"];?>" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo $galleryItem["foto_adress"].$galleryItem["foto_name"];?>">
                    </a>
                    <?php
                }
            }

            $bdconn->close();
            ?>
            </div>

        </div>


    </div>

</body>

</html>