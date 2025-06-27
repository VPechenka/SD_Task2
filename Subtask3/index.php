<?php

declare(strict_types=1);

function get_action(string $string): string
{
    if (mb_strpos($string, '+') !== false) {
        $action = '+';
    } elseif (mb_strpos($string, '**') !== false) {
        $action = '**';
    } elseif (mb_strpos($string, '*') !== false) {
        $action = '*';
    } elseif (mb_strpos($string, '/') !== false) {
        $action = '/';
    } elseif (mb_strpos($string, '%') !== false) {
        $action = '%';
    } elseif (mb_strpos($string, '-') !== false) {
        $action = '-';
    } else {
        $action = '?';
    }
    return $action;
}

function is_prime(int $number): bool
{
    $result = true;
    if ($number <= 1) {
        $result = false;
    }
    for ($i = 2; $i ** 2 <= $number; $i++) {
        if ($number % $i === 0) {
            $result = false;
            break;
        }
    }
    return $result;
}

function get_numbers(string $string, string $action): ?array
{
    $string = explode($action, $string);
    $is_negative = false;
    $numbers = [];
    foreach ($string as $value) {
        if (trim($value) == '') {
            $is_negative = true;
        } elseif (is_numeric($value)) {
            $numbers[] = (float)trim($value);
            if ($is_negative) {
                $numbers[count($numbers) - 1] = 0 - $numbers[count($numbers) - 1];
                $is_negative = false;
            }
        } else {
            $numbers = null;
            break;
        }
    }
    return $numbers;
}

function get_result(array $numbers, string $action): ?float
{
    switch ($action) {
        case '+':
            $result = $numbers[0] + $numbers[1];
            break;
        case '-':
            $result = $numbers[0] - $numbers[1];
            break;
        case '*':
            $result = $numbers[0] * $numbers[1];
            break;
        case '/':
            if ($numbers[1] === 0.0) {
                $result = null;
            } else {
                $result = $numbers[0] / $numbers[1];
            }
            break;
        case '**':
            $result = $numbers[0] ** $numbers[1];
            break;
        case '%':
            $result = $numbers[0] % $numbers[1];
            break;
    }
    return $result;
}

do {
    print_r("=> ");
    $input = trim(fgets(STDIN));
    $action = get_action($input);
    if ($action === '?') {
        if (filter_var($input, FILTER_VALIDATE_INT)) {
            print_r(is_prime((int)$input) ? "Простое\n" : "Не простое\n");
        } elseif (trim($input) === 'esc') {
            break;
        } else {
            print_r("Введенные данные не допустимы\n");
        }
    } else {
        $number_array = get_numbers($input, $action);
        if (is_null($number_array)) {
            print_r("Введенные данные не допустимы\n");
        } else {
            $result = get_result($number_array, $action);
            print_r(
                is_null($result) ? "Деление на ноль не возможно\n" : $result . PHP_EOL
            );
        }

    }
} while (true);
