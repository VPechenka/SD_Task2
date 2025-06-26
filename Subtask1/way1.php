<?php

declare(strict_types=1);

function mb_ucfirst(string $string, string $encoding = "UTF-8")
{
    $firstChar = mb_substr($string, 0, 1, $encoding);
    $then = mb_substr($string, 1, null, $encoding);
    return mb_strtoupper($firstChar, $encoding) . $then;
}

do {
    print_r("Введите имя => ");
    $name = trim(fgets(STDIN));
    $name = mb_ucfirst(mb_strtolower($name));
} while (!$name);

do {
    print_r("Введите возраст (целое число) => ");
    $age = trim(fgets(STDIN));
    if ($age && !filter_var($age, FILTER_VALIDATE_INT)) {
        print_r("Возраст должен быть целым числом\n");
        $age = '';
    } else {
        $age = (int)$age;
    }
} while (!$age);

if ($age < 18) {
    $phrase = "не совершеннолетний(ая)";
} else {
    $phrase = "совершеннолетний(ая)";
}

print_r("Привет $name!!! Тебе $age, а значит ты $phrase.\n");