<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homework 4</title>
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
        1. Создать галерею фотографий. Она должна состоять всего из одной странички, на которой пользователь видит все картинки в уменьшенном виде и форму для загрузки нового изображения. При клике на фотографию она должна открыться в браузере в новой вкладке. Размер картинок можно ограничивать с помощью свойства width. При загрузке изображения необходимо делать проверку на тип и размер файла.
        </h2>
        <h2>
        2. *Строить фотогалерею, не указывая статичные ссылки к файлам, а просто передавая в функцию построения адрес папки с изображениями. Функция сама должна считать список файлов и построить фотогалерею со ссылками в ней.
        </h2>

        <div class="gallery">
            <?php
            $imgsource = scandir("./illustrations");
            foreach ($imgsource as $imgfile) { 
                if ($imgfile != "." && $imgfile != "..") {
                    ?>
                <a href="./illustrations/<?php echo $imgfile; ?>" target="_blank" rel="noopener noreferrer">
                <img src="./illustrations/<?php echo $imgfile; ?>">
                </a>
                <?php
                }
            }
            ?>
        </div>

        <div class="fileloader">
            <form enctype="multipart/form-data" action="HW_4_uploadfilescript.php" method="post">
            <input type="hidden" name="MAX_FILE_SIZE" value="30000">
            <input type="file" name="newuseruploadfile" id="loadfileinput">
            <button type="submit">Отправить</button>
            </form>
        </div>
    </div>

    <div class="task">
        <h2>
        3. *[ для тех, кто изучал JS-1 ] При клике по миниатюре нужно показывать полноразмерное изображение в модальном окне
        </h2>

        <div class="gallery gallery-with-js">
            <?php
            $imgsource = scandir("./illustrations");
            foreach ($imgsource as $imgfile) { 
                if ($imgfile != "." && $imgfile != "..") {
                    ?>
                <a href="./illustrations/<?php echo $imgfile; ?>" target="_blank" rel="noopener noreferrer">
                <img src="./illustrations/<?php echo $imgfile; ?>">
                </a>
                <?php
                }
            }
            ?>

            <script>
                window.onload = function() {
                    let galleryArea = document.querySelector(".gallery-with-js").querySelectorAll("img");
                    

                    galleryArea.forEach(function(imgitem) {
                        imgitem.addEventListener("click", function(ev) {
                            ev.preventDefault();
                            
                            let modalWindow = `<div class="modal-window">${imgitem.outerHTML}</div>`;
                            document.querySelector(".gallery-with-js").insertAdjacentHTML('afterend', modalWindow);
                            document.querySelector(".modal-window").addEventListener('click', function(ev) {
                                ev.target.remove();
                            })
                        })
                    })
                    

                }
                

            </script>
        </div>
    </div>

    </div>



    
</body>
</html>