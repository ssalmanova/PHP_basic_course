<?php
/*
CREATE TABLE IF NOT EXISTS users (
	id SERIAL PRIMARY KEY,
	login VARCHAR(250) NOT NULL UNIQUE,
	pass VARCHAR(250) NOT NULL
);
*/
$_POST = json_decode(file_get_contents('php://input'), true);

$bdconn = new mysqli("localhost", "homeworker","HW_testtask_01","phpbasic");

if ($bdconn->connect_error) {
    echo "Чёта не пашет";
}
else {
    $login = $_POST['login'];
    if ($bdconn->query("SELECT login FROM users WHERE login=$login;")) {
        echo "Логин занят. Придумайте другой.";
    }
    else {
        $pass = $_POST['pass'];
        if ($bdconn->query("INSERT INTO users (login, pass) VALUES ('$login', '$pass');")) {
            echo "Вы успешно зарегались. Теперь авторизуйтесь.";
        }
        else {
            echo "Что-то пошло не так.";
        }
    }    
}
$bdconn->close();
?>