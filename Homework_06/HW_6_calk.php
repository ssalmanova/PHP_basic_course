<?php
switch ($_GET["oper"]) {
    case "sum": 
        echo (int) $_GET["num1"] + (int) $_GET["num2"];
        break;

    case "sub":
        echo (int) $_GET["num1"] - (int) $_GET["num2"];
        break;

    case "mult":
        echo (int) $_GET["num1"] * (int) $_GET["num2"];
        break;

    case "div":
        echo (int) $_GET["num1"] / (int) $_GET["num2"];
        break;
}
?>