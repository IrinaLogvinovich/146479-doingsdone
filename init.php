<?php
require_once("functions.php");

$connect = mysqli_connect("localhost", "root", "", "doingsdone_146479");
mysqli_set_charset($connect, "utf8");

if ($connect == false) {
    print("На сайте произошла ошибка. Пожалуйста, зайдите попозже");
    exit();
}
?>
