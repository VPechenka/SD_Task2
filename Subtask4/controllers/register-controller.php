<?php

declare(strict_types=1);

$name = "";
$gender = "";
$age = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = trim($_POST['name']);
    $gender = $_POST['gender'];
    $age = trim($_POST['age']);

    if (empty($name))
        $error = "Поле имя должно быть заполнено";
    elseif (empty($gender) or in_array($gender, array("male", "female")) === false)
        $error = 'Пол не выбран или данного гендера нет в списке';
    elseif (empty($age) or filter_var($age, FILTER_VALIDATE_INT) === false)
        $error = "Поле возраста не заполнено или возраст указан не корректно";
    elseif (empty($_POST['password']))
        $error = "Поле пароля должно быть заполнено";
    else {
        require_once __DIR__ . "/../models/User.php";
        $age = (int)$age;
        $user = new User($name, $gender, $age, $_POST['password']);
    }
}