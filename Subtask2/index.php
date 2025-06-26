<?php

declare(strict_types=1);

function ar_sum(array $array): int
{
    $sum = 0;
    foreach ($array as $value) {
        $sum += $value;
    }
    return $sum;
}

function ar_max(array $array): int
{
    $max = $array[0];
    foreach ($array as $value) {
        if ($value > $max) {
            $max = $value;
        }
    }
    return $max;
}

function ar_min(array $array): int
{
    $min = $array[0];
    foreach ($array as $value) {
        if ($value < $min) {
            $min = $value;
        }
    }

    return $min;
}

function ar_honest_numbers(array $array): array
{
    $honest_numbers = [];
    foreach ($array as $value) {
        if ($value % 2 === 0) {
            $honest_numbers[] = $value;
        }
    }
    return $honest_numbers;
}

function read_file(string $filename): array
{
    $file = fopen($filename, "r");
    $text = fread($file, filesize($filename));
    fclose($file);

    return json_decode($text, true);
}

function pprint(array $data): void
{
    print_r("Массив: ");

    foreach ($data as $value) {
        print_r($value . " ");
    }

    print_r("\n");

    print_r("Сумма массива: " . ar_sum($data) . "\n");
    print_r("Максимальный элемент массива: " . ar_max($data) . "\n");
    print_r("Минимальный элемент массива: " . ar_min($data) . "\n");

    print_r("Четные значения массива: ");

    foreach (ar_honest_numbers($data) as $value) {
        print_r($value . " ");
    }
}

pprint(read_file("data.json"));

