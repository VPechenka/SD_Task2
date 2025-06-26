<?php

declare(strict_types=1);

function mb_ucfirst($string, $encoding = "UTF-8")
{
    $firstChar = mb_substr($string, 0, 1, $encoding);
    $then = mb_substr($string, 1, null, $encoding);
    return mb_strtoupper($firstChar, $encoding) . $then;
}

if ($argc < 3) {
    if (1 == $argc) {
        $phrase = 'и';
    } else {
        $phrase = 'или';
    }
    print_r("Не введены имя $phrase возраст");
} else {
    $name = mb_ucfirst(mb_strtolower(trim($argv[1])));

    $age = trim($argv[2]);
    if ($age && !filter_var($age, FILTER_VALIDATE_INT)) {
        print_r("Возраст должен быть целым числом\n");
    } else {
        $age = (int)$age;

        if ($age < 18) {
            $phrase = "не совершеннолетний(ая)";
        } else {
            $phrase = "совершеннолетний(ая)";
        }

        print_r("Привет $name!!! Тебе $age, а значит ты $phrase.\n");
    }
}
