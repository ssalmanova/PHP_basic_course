<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homework 7</title>
    <style>
        .goods-list-block {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .goods-list-block-item {
            display: flex;
            padding: 20px;
            width: 300px;
            flex-wrap: wrap;
            flex-direction: row;
        }

        .wrapper {
            width: 1040px;
            margin: 0 auto;
        }

        .goods-list-block-item div {
            width: 100%;
            text-align: center;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>

    <?php
    if (isset($_COOKIE['login'])) {?>

    <div class="wrapper">
        Добрый день, <?php echo $_COOKIE['login'];?>!
    </div>

    <?php } else {?>

    <div class="reg-auth-area wrapper">
        <p><b>Вы не авторизованы. Авторизуйтесь.</b></p>
        <p>Логин:</p>
        <input type="text" id="login">
        <p>Пароль:</p>
        <input type="password" name="" id="">
        <button id="auth">Войти</button>

        <div style="margin-top:30px">
            <p><b>Если у вас ещё нет аккаунта, зарегистрируйтесь:</b></p>
            <p>Придумайте логин:</p>
            <input type="text" id="login-new-user">
            <p>Придумайте пароль:</p>
            <input type="text" name="" id="password-new-user">
            <button id="reg">зарегаться</button>
        </div>

        <script>
            $("#auth").on('click', function (e) {

                let authData = {
                    login: $("#login").val(),
                    pass: $("#password").val(),
                }

                $.ajax({
                    url: "auth.php",
                    type: "post",
                    data: JSON.stringify(authData),
                    contentType: 'application/json',
                    success: function (data) {
                        alert(data);
                        $(".reg-auth-area").html(`
                            <p>Привет, ${$("#login").val()}!</p>
                        `)
                    },
                    error: function () {
                        alert('Что-то не так.');
                    }
                })
            })

            $("#reg").on('click', function (e) {

                let regData = {
                    login: $("#login-new-user").val(),
                    pass: $("#password-new-user").val(),
                }

                $.ajax({
                    url: "reg.php",
                    type: "post",
                    data: JSON.stringify(regData),
                    contentType: 'application/json',
                    success: function (data) {
                        alert(data);
                    },
                    error: function () {
                        alert('Что-то не так. Alert from JS.');
                    }
                })
            })
        </script>
    </div>

    <?php }
?>




    <div class="goods-list-block wrapper">
        <div class="goods-list-block-item">
            <div>
                <h2>Item 1</h2>
            </div>
            <div>
                <img src="illustrations/shop_catalog/001_item.png" alt="">
            </div>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia, quis vitae? Minus a vero fuga atque
                deleniti eius quia rem sed delectus nulla enim rerum, commodi temporibus quam, aliquam corporis.
            </p>
            <div id="1">
                <button class="cart-button add-to-cart">Добавить</button>
                <button class="cart-button remove-from-cart">Удалить</button>
            </div>
        </div>
        <div class="goods-list-block-item">
            <div>
                <h2>Item 2</h2>
            </div>
            <div>
                <img src="illustrations/shop_catalog/002_item.png" alt="">
            </div>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia, quis vitae? Minus a vero fuga atque
                deleniti eius quia rem sed delectus nulla enim rerum, commodi temporibus quam, aliquam corporis.
            </p>
            <div id="2">
                <button class="cart-button add-to-cart">Добавить</button>
                <button class="cart-button remove-from-cart">Удалить</button>
            </div>
        </div>

        <div class="goods-list-block-item">
            <div>
                <h2>Item 3</h2>
            </div>
            <div>
                <img src="illustrations/shop_catalog/003_item.png" alt="">
            </div>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia, quis vitae? Minus a vero fuga atque
                deleniti eius quia rem sed delectus nulla enim rerum, commodi temporibus quam, aliquam corporis.
            </p>
            <div id="3">
                <button class="cart-button add-to-cart">Добавить</button>
                <button class="cart-button remove-from-cart">Удалить</button>
            </div>

        </div>
        <div class="cart">
            <h2>Корзина</h2>
        </div>
    </div>
    <script>
        $("button.cart-button").on("click", function (e) {
            e.preventDefault();

            let cartAction = {};

            if ($(e.target).hasClass('add-to-cart')) {
                cartAction.quantity = 1;
            } else {
                if ($(e.target).hasClass('remove-from-cart')) {
                    //
                } else {
                    return;
                }
            }

            cartAction.id_product = $(e.target).parent().attr('id');

            $.ajax({
                url: "HW_7_1.php",
                type: "post",
                data: JSON.stringify(cartAction),
                contentType: 'application/json',
                success: function (data) {
                    alert(data);
                },
                error: function () {
                    alert('Что-то не так.');
                }
            })

        });
    </script>
</body>

</html>