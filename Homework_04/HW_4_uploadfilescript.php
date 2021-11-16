<?php
$fileuploaddir = '/illustrations/';
$fileupload = $_SERVER['DOCUMENT_ROOT'] . $fileuploaddir . basename($_FILES['newuseruploadfile']['name']);
if (move_uploaded_file($_FILES['newuseruploadfile']['tmp_name'], $fileupload)) {
    echo "Файл успешно загружен. Обновите предыдущую страницу, он появится в галерее";
}
else {
    echo "В чем-то косяк";
}
?>