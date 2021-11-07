<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ДЗ 2</title>
</head>

<style>
    footer {
        background-color:lightsteelblue;
    }
</style>

<body>
    <?php
    echo "Задание 1. <br>";
    /*1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт, который работает по следующему принципу:
если $a и $b положительные, вывести их разность;
если $а и $b отрицательные, вывести их произведение;
если $а и $b разных знаков, вывести их сумму;
Ноль можно считать положительным числом.*/

$a = 10;
$b = -1500;

function hw_task_1 ($x, $y) {
    if (($x >= 0) && ($y >= 0)) { echo $x-$y; }
    else if (($x < 0) && ($y < 0)) { echo $x*$y; }
        else { echo $x+$y; }
}

hw_task_1($a, $b);
echo "<br><br>";
echo "Задание 2. <br>";
/*2. Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от $a до 15.*/

/* Не понимаю это задание. Зачем тут свитч, если нельзя использовать его фишку с выполнением без брейка?*/

function hw_task_2($n) {
    while ($n<=14) {
        echo "$n, ";
        $n++;
    }
    echo "$n.";
}

switch ($a) {
    case 0:
        hw_task_2($a);
        break;
    case 1:
        hw_task_2($a);
        break;
    case 2:
        hw_task_2($a);
        break;
    case 3:
        hw_task_2($a);
        break;
    case 4:
        hw_task_2($a);
        break;
    case 5:
        hw_task_2($a);
        break;
    case 6:
        hw_task_2($a);
        break;
    case 7:
        hw_task_2($a);
        break;
    case 8:
        hw_task_2($a);
        break;
    case 9:
        hw_task_2($a);
        break;
    case 10:
        hw_task_2($a);
        break;
    case 11:
        hw_task_2($a);
        break;
    case 12:
        hw_task_2($a);
        break;
    case 13:
        hw_task_2($a);
        break;
    case 14:
        hw_task_2($a);
        break;
    case 15:
        hw_task_2($a);
        break;
}

echo "<br><br>";
echo "Задание 3. <br>";
/*3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return.*/

function sum($x, $y) {
    return $x+$y;
}

function sub($x, $y) {
    return $x-$y;
}

function mult($x, $y) {
    return $x*$y;
}

function div($x, $y) {
    return $x/$y;
}
echo "Сумма: ".sum($a,$b)."<br>";
echo "Разность: ".sub($a,$b)."<br>";
echo "Умножение: ".mult($a,$b)."<br>";
echo "Деление: ".div($a,$b);

echo "<br><br>";
echo "Задание 4. <br>";
/*4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).*/

function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case 'summation':
            return sum($arg1, $arg2);
            break;
        
        case 'subtraction':
            return sub($arg1, $arg2);
            break;

        case 'multiplication':
            return mult($arg1, $arg2);
            break;

        case 'division':
            return div($arg1, $arg2);
            break;
        
        default:
            return "Неверное название операции";
    }
}

echo mathOperation($a, $b, 'summation');

echo "<br><br>";
echo "Задание 5. <br>";
/*5. Посмотреть на встроенные функции PHP. Используя имеющийся HTML-шаблон, вывести текущий год в подвале при помощи встроенных функций PHP.*/

echo "Выведено в футере, как требует задание. ";

echo "<br><br>";
echo "Задание 6. <br>";
/*6. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень.*/

function power($val, $pow) {
    if ($pow == 0) {
        return 1;
    }
    
    if ($pow == 1) {
        return $val;
    }
    else if ($pow > 0) {
        return $val*power($val, --$pow);
        }
        else {
            return 1/power($val, -$pow);
        }
}

echo "2 в 10 степени равно ".power(2, 10)."<br>";
echo "2 в -10 степени равно ".power(2,-10)."<br>";
echo "2 в 0 степени равно ".power(2,0)."<br>";

echo "<br>";
echo "Задание 7. <br>";
/*7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
22 часа 15 минут
21 час 43 минуты */
function hw_task_7_time() {
    //$chas = [1,21];
    //$chasov = [0,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20];
    //$chasa = [2,3,4,22,23];

    //$minut *5, *6, 7*, 8*, 9*, *0, 11-19 
    //$minuta *1,
    //$minuti *2, *3, *4, 
    $hours = date('G');

    if ($hours == 1 || $hours == 21) {
        $current_time = $hours." час ";
    }
    else if ($hours == 2 || $hours == 3 || $hours == 4 || $hours == 22 || $hours == 23) {
        $current_time = $hours." часа ";
    }
        else $current_time = $hours." часов ";
    
    $minuts = date('i');

    if ($minuts >= 11 && $minuts <=20) {
        return $current_time . $minuts ." минут";
    }
    else if ($minuts % 10 == 1) {
        return $current_time . $minuts ." минута";
        }
        else if ($minuts % 10 == 2 || $minuts % 10 == 3 || $minuts % 10 == 4) {
        return $current_time . $minuts ." минуты";
        }
            else return $current_time . $minuts ." минут";
}

echo hw_task_7_time();


    ?>

    <footer>
        <?php
        echo date('Y');
        ?>
    </footer>
</body>

</html>