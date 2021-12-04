<?php
/*
Я помню, что пароли открыто не хранятся. Потом разберусь с хэширующими функциями.
*/
$_POST = json_decode(file_get_contents('php://input'), true);

$bdconn = new mysqli("localhost", "homeworker","HW_testtask_01","phpbasic");

if ($bdconn->connect_error) {
    echo "Чёта не пашет";
}
else {
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    if ($bdconn->query("SELECT login FROM users WHERE (login='$login' AND pass='$pass');")) {
        echo "Всё верно";
        setcookie("login", "$login");
    }
    else {
        echo "Ошибка авторизации.";
    }    
}
$bdconn->close();
?>