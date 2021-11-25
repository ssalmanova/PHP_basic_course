<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homework 6</title>
    <style>
        .wrapper {
            width: 1140px;
            margin: 0 auto;
        }

        input,button {
            margin-bottom: 12px;
        }

        select {
            margin-bottom: 12px;
        }
    </style>
    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <h2>1. Создать форму-калькулятор с операциями: сложение, вычитание, умножение, деление. Не забыть обработать деление на ноль! Выбор операции можно осуществлять с помощью тега select.</h2>
        <form action="HW_6_calk.php" method="get">
        <div class="calk" style="width: 300px;">
        <input type="number" name="one" id="one"><br>
        <input type="number" name="two" id="two"><br>
        <select name="operation" id="operation">
            <option value="sum">Сложение</option>
            <option value="sub">Вычитание</option>
            <option value="mult">Умножение</option>
            <option value="div">Деление</option>
        </select><br>
        <input id="letsgo" type="submit" value="Вычислить">
        </form>
        <div class="answer"></div>
        </div>
        <script>
            $("#letsgo").on("click", function(ev) {
                ev.preventDefault();
                let num1 = encodeURIComponent($("#one").val());
                let num2 = encodeURIComponent($("#two").val());
                let oper = encodeURIComponent($("#operation").val());
                $.ajax({
                    type: "GET",
                    url: "HW_6_calk.php",
                    data: `oper=${oper}&num1=${num1}&num2=${num2}`,
                    dataType: "text",
                    success: function(data) {
                        $(".answer").html(data);
                    },
                    error: function() {
                        alert("Fail");
                    }
                })
            });
            
        </script>

        <h2>2. Создать калькулятор, который будет определять тип выбранной пользователем операции, ориентируясь на нажатую кнопку.</h2>
        <form action="HW_6_calk.php" method="get">
        <div class="calk" style="width: 300px;">
        <input type="number" name="one" id="three"><br>
        <input type="number" name="two" id="four"><br>
        <button class="operbutton" value="sum" id="sum">Сложение</button><br>
        <button class="operbutton" value="sub">Вычитание</button><br>
        <button class="operbutton" value="mult">Умножение</button><br>
        <button class="operbutton" value="div">Деление</button><br>
        <br>
        </form>
            <div class="answer2"></div>
        <script>
            $(".operbutton").on("click", function(ev) {
                ev.preventDefault();
                let num1 = encodeURIComponent($("#three").val());
                let num2 = encodeURIComponent($("#four").val());
                let oper = encodeURIComponent($(this).attr("value"));
                
                $.ajax({
                    type: "GET",
                    url: "HW_6_calk.php",
                    data: `oper=${oper}&num1=${num1}&num2=${num2}`,
                    dataType: "text",
                    success: function(data) {
                        $(".answer2").html(data);
                    },
                    error: function() {
                        alert("Fail");
                    }
                })
            });
            
        </script>
    </div>

</body>

</html>