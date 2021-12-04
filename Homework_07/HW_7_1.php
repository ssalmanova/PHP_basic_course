<?php
/*
Давайте вообразим, что названия и свойства товара хранятся где-то в связанной таблице.

CREATE TABLE IF NOT EXISTS goods (
	id SERIAL PRIMARY KEY
);

CREATE TABLE IF NOT EXISTS carts (
	login BIGINT UNSIGNED NOT NULL,
	good_id BIGINT UNSIGNED NOT NULL,
	quantity INT,
	PRIMARY KEY (login, good_id),
	FOREIGN KEY (login) REFERENCES users(login) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (good_id) REFERENCES goods(id) ON UPDATE CASCADE ON DELETE CASCADE
);
*/
class Cart {
    public $result, $errorMessage;
}

$res = new Cart();

$_POST = json_decode(file_get_contents('php://input'), true);

if (isset($_COOKIE['login'])) {
    $bdconn = new mysqli("localhost", "homeworker","HW_testtask_01","phpbasic");

    if ($bdconn->connect_error) {
    echo "Чёта не пашет";
    }
    else {
        $login = $_COOKIE['login'];
        $id_product = $_POST['id_product'];
        if (isset($_POST['quantity'])) {
            if ($bdconn->query("SELECT quantity FROM carts WHERE (login='$login' AND id_product='$id_product');")) {
                ///Тут увеличиваем кол-во
            }
            else {
                //если увеличивать нечего, то добавляем товар в кол-ве 1 шт по ид
            }    
        }
        else {
            //Уменьшаем quantity на 1, если есть куда уменьшать.
            //Если некуда, выкидываем пользователю ошибку.
        }
        
    }
    $bdconn->close();
}
else {
    $res->result = 0;
    $res->errorMessage = "Сначала авторизуйтесь, потом товары в корзину кладите";
}

echo json_encode($res);
?>