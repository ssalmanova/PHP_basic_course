<?php
$h1_content = "Домашка №1";
$title_content = "Удивительный хоумворк";
$current_year = date('Y');
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $title_content; ?>
    </title>
</head>

<body>
    <h1>
        <?php echo $h1_content; ?>
    </h1>
    <p>
        Сейчас <?php echo $current_year; ?> год.
    </p>

<?php
/*1. Установить программное обеспечение: веб-сервер, базу данных, интерпретатор, текстовый редактор. Проверить, что все работает правильно.

Готово.

2. Выполнить примеры из методички и разобраться, как это работает.

Ниже в файле.

3. Объяснить, как работает данный код:
<?php
    $a = 5;
    $b = '05';
    var_dump($a == $b);         // Почему true? - сработало неявное приведение типов при нестрогом сравнении.
    var_dump((int)'012345');     // Почему 12345? - в целых числах 0 не является значащим.
    var_dump((float)123.0 === (int)123.0); // Почему false? - потому что разные типы данных не равны при строгом сравнении, а тут число с плавающей точкой и целое.
    var_dump((int)0 === (int)'hello, world'); // Почему true? - потому что при приведении к числу строка, если она не начинается с цифр, считается равной 0, насколько я помню.
?>
4. Используя имеющийся HTML-шаблон, сделать так, чтобы главная страница генерировалась через PHP. Создать блок переменных в начале страницы. Сделать так, чтобы h1, title и текущий год генерировались в блоке контента из созданных переменных.

Не поняла, какой шаблон у нас имеется. 

5. *Используя только две переменные, поменяйте их значение местами. Например, если a = 1, b = 2, надо, чтобы получилось b = 1, a = 2. Дополнительные переменные использовать нельзя.
*/
$a = 1;
$b = 2;

$a += $b;
$b = $a - $b;
$a -= $b;

echo "a=$a, b=$b";
?>
<br>

<?php
echo "Hello, World!";
?>

<?php
$name = "Sveta";
echo "Hello, $name!";
?>

<?php
define("HOMEWORK_CONST", "Хочется кофе.");
echo HOMEWORK_CONST;
?>
<br>
<?php
$int10 = 42;
$int2 = 0b101010;
$int8 = 052;
$int16 = 0x2A;
echo "Десятеричная система $int10 <br>";
echo "Двоичная система $int2 <br>";
echo "Восьмеричная система $int8 <br>";
echo "Шестнадцатеричная система $int16 <br>";
?>

<?php
$precise1 = 1.5;
$precise2 = 1.5e4;
$precise3 = 6E-8;
echo "$precise1 | $precise2 | $precise3";
?>
<br>
<?php
$a = 1;
echo "$a";
echo '$a';
?>
<br>
<?php
$a = 10;
$b = (boolean) $b;
?>
<?php
$a = 'Hello,';
$b = 'world';
$c = $a . $b. '!';
echo $c;
?>
<br>
<?php
$a = 4;
$b = 5;
echo $a + $b . '<br>'; // сложение
echo $a * $b . '<br>'; // умножение
echo $a -$b . '<br>'; // вычитание
echo $a / $b . '<br>'; // деление
echo $a % $b . '<br>'; // остаток от деления
echo $a ** $b . '<br>'; // возведение в степень
?>
<?php
$a = 4;
$b = 5;
$a += $b;
echo 'a = ' . $a;
$a = 0;
echo $a++; // Постинкремент
echo ++$a; // Преинкремент
echo $a­­--; // Постдекремент
//echo­ --$a; // Предекремент <-- выдаёт ошибку
?>
<br>
<?php
$a = 4;
$b = 5;
var_dump($a == $b); // Сравнение по значению
var_dump($a === $b); // Сравнение по значению и типу
var_dump($a > $b); // Больше
var_dump($a < $b); // Меньше
var_dump($a <> $b); // Не равно
var_dump($a != $b); // Не равно
var_dump($a !== $b); // Не равно без приведения типов
var_dump($a <= $b); // Меньше или равно
var_dump($a >= $b); // Больше или равно
?>

</body>

</html>