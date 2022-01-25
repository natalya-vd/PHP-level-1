<?php
declare(strict_type = 1);
// Задание 1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт, который работает по следующему принципу:
// если $a и $b положительные, вывести а и б положительные;
// если $а и $b отрицательные, вывести а и б отрицательные;
// если $а и $b разных знаков, вывести а и б разных знаков;
// Ноль можно считать положительным числом.

echo 'Задание 1 <br>';

$a = rand(-100, 100);
$b = rand(-100, 100);

echo "a = {$a}; b = {$b} <br>";

if($a >= 0 && $b >= 0) {
    echo "а и б положительные <br><br>";
} else if ($a < 0 && $b < 0) {
    echo "а и б отрицательные <br><br>";
} else {
    echo "а и б разных знаков <br><br>";
};



// Задание 2. Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от $a до 15. При желании сделайте это задание через рекурсию.

echo 'Задание 2 <br>';
$a = rand(0, 15);
echo "a = {$a} <br>";

//Сделай через goto
switch($a) {
    case 0:
        echo '0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15';
        break;
    case 1:
        echo '1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15';
        break;
    case 2:
        echo '2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15';
        break;
    case 3:
        echo '3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15';
        break;
    case 4:
        echo '4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15';
        break;
    case 5:
        echo '5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15';
        break;
    case 6:
        echo '6, 7, 8, 9, 10, 11, 12, 13, 14, 15';
        break;
    case 7:
        echo '7, 8, 9, 10, 11, 12, 13, 14, 15';
        break;
    case 8:
        echo '8, 9, 10, 11, 12, 13, 14, 15';
        break;
    case 9:
        echo '9, 10, 11, 12, 13, 14, 15';
        break;
    case 10:
        echo '10, 11, 12, 13, 14, 15';
        break;
    case 11:
        echo '11, 12, 13, 14, 15';
        break;
    case 12:
        echo '12, 13, 14, 15';
        break;
    case 13:
        echo '13, 14, 15';
        break;
    case 14:
        echo '14, 15';
        break;
    case 15:
        echo '15';
        break;
    default:
        echo 'Неверное число';
};

echo '<br><br>';
echo 'Задание 2 Вывод через рекурсию <br>';

function recursive($number, $max) {
    if($number >= $max) {
        return $max;
    }
    return "{$number}, " . recursive($number + 1, $max);
};

echo recursive($a, 15);
echo '<br><br>';



// Задание 3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return. В делении проверьте деление на 0 и верните текст ошибки.

function sum(int $x, int $y): int {
    return $x + $y;
};

function subtraction(int $x, int $y): int {
    return $x - $y;
};

function multiplication(int $x, int $y): int {
    return $x * $y;
};

function division(int $x, int $y) {
    return $y == 0 ? 'На ноль делить нельзя' : $x / $y;
}

echo 'Задание 3 <br>';
$x = rand(-100, 100);
$y = rand(-100, 100);

echo "x = {$x} y = {$y} <br>";
echo 'Сумма равна ' . sum($x, $y) . ';<br>';
// echo "Сумма равна sum($x, $y);<br>"; // Хотела сделать что-то типа этого, но не получилось. Не поняла как мне одновременно вызвать функцию и склеить ее результат со строкой? Можно так сделать или здесь только использовать кучу кавычек и знак конкатенации?
echo 'Разность равна ' . subtraction($x, $y) . ';<br>';
echo 'Произведение равно ' . multiplication($x, $y) . ';<br>';
echo 'Частное равно ' . division($x, $y) . ';<br>';
echo '<br><br>';



// Задание 4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).

function mathOperation($arg1, $arg2, $operation) {
    switch($operation) {
        case 'sum':
            return sum($arg1, $arg2);
        case 'subtraction': 
            return subtraction($arg1, $arg2);
        case 'multiplication':
            return multiplication($arg1, $arg2);
        case 'division':
            return division($arg1, $arg2);
        default:
            return "Невозможно выполнить операцию - {$operation}. Введите: sum, subtraction, multiplication или division";
    }
};

function mathOperationRecursive($arg1, $arg2, $operation) {
    if($operation !== "sum" && $operation !== "subtraction" && $operation !== "multiplication" && $operation !== "division") {
        return "Невозможно выполнить операцию - {$operation}. Введите: sum, subtraction, multiplication или division";
    }
    return $operation($arg1, $arg2);
};

$x = rand(-100, 100);
$y = rand(-100, 100);
$operation = 'subtraction';

echo 'Задание 4. Введите возможную операцию: sum, subtraction, multiplication или division <br>';
echo "x = {$x} y = {$y} <br>";
echo "Операция: {$operation} <br>";
echo 'Результат: ' . mathOperation($x, $y, $operation) . '<br><br>';

echo 'Задание 4. Функция через рекурсию. Введите возможную операцию: sum, subtraction, multiplication или division <br>';
echo "x = {$x} y = {$y} <br>";
echo "Операция: {$operation} <br>";
echo 'Результат: ' . mathOperationRecursive($x, $y, $operation) . '<br><br>';



//6. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень.

function power($val, $pow) {
    if($pow != 0 && $val != 0) {
        return $val * power($val, $pow - 1);
    } else if($val != 0) {
        return 1;
    }
    return 0;
};

$x = rand(-100, 100);
$y = rand(0, 5);

echo 'Задание 6. <br>';
echo "x = {$x} y = {$y} <br>";
echo "{$x} в степени {$y} = " . power($x, $y);
echo '<br><br>';



// 7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
// 22 часа 15 минут
// 21 час 43 минуты

/*
0 часов	минут	10 часов минут 20 часов минут	30 минут  40 минут  50 минут  
1 час	минута	11 часов минут 21 час	минута	31 минута 41 минута 51 минута
2 часа	минуты	12 часов минут 22 часа	минуты	32 минуты 42 минуты 52 минуты
3 часа	минуты	13 часов минут 23 часа	минуты	33 минуты 43 минуты 53 минуты
4 часа	минуты	14 часов минут 24 часа	минуты	34 минуты 44 минуты 54 минуты
5 часов	минут	15 часов минут 25		минут	35 минут  45 минут  55 минут
6 часов	минут	16 часов минут 26		минут	36 минут  46 минут  56 минут
7 часов минут	17 часов минут 27		минут	37 минут  47 минут  57 минут
8 часов	минут	18 часов минут 28		минут	38 минут  48 минут  58 минут
9 часов минут	19 часов минут 29		минут	39 минут  49 минут  59 минут
*/

function timeFormat($word, $number) {
    $words = [
        'час' => ['час', 'часа', 'часов'],
        'минута' => ['минута', 'минуты', 'минут']
    ];

    if($number % 10 >= 2 && $number % 10 <= 4 && ($number % 100 < 11 || $number % 100 > 14)) {
        return $words[$word][1];
    };

    if($number % 10 == 1 && $number % 100 != 11) {
        return $words[$word][0];
    };

    return $words[$word][2];
};

$hour = rand(0, 24);
$minute = rand(0, 60);

echo 'Задание 7. <br>';
echo "Часы = {$hour}, минуты = {$minute} <br>";
echo 'Результат: ' ."{$hour} " . timeFormat('час', $hour) . ' ' ."{$minute} " . timeFormat('минута', $minute);