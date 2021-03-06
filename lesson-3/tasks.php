<?php
// Задание 1. С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.
$max = 100;
$i = 0;

echo "Задание 1 <br>";
while($i <= $max) {
    echo $i % 3 === 0 ? $i . " " : '';
    $i++;
}
echo "<br><br>";



// Задание 2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:
// 0 – ноль.
// 1 – нечетное число.
// 2 – четное число.
// 3 – нечетное число.
// …
// 10 – четное число.
$max = 10;
$i = 0;

echo "Задание 2 <br>";
do {
    if($i === 0) {
        echo "{$i} - ноль. <br>";
    } else if($i % 2 === 0) {
        echo "{$i} - четное число. <br>";
    } else {
        echo "{$i} - нечетное число. <br>";
    }
    $i++;
} while ($i <= $max);

echo "<br>";
echo "Задание 2. Побитово <br>";
$max = 10;
$i = 0;
do {
    if($i === 0) {
        echo "{$i} - ноль. <br>";
    } else if($i & 1) {
        echo "{$i} - нечетное число. <br>";
    } else {
        echo "{$i} - четное число. <br>";
    }
    $i++;
} while ($i <= $max);

echo "<br>";



// Задание 3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений – массивы с названиями городов из соответствующей области. Вывести в цикле значения массива, чтобы результат был таким:
// Московская область:
// Москва, Зеленоград, Клин.
// Ленинградская область:
// Санкт-Петербург, Всеволожск, Павловск, Кронштадт.
// Рязанская область … (названия городов можно найти на maps.yandex.ru) строго соблюдать формат вывода выше, т.е. двоеточие и точка в конце

$arrayCities = [
    "Московская область" => [
        "Москва", "Зеленоград", "Клин"
    ],
    "Ленинградская область" => [
        "Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"
    ],
    "Рязанская область" => [
        "Рязань", "Рыбное", "Михайлов", "Кораблино", "Ерахтур"
    ]
];

echo "Задание 3 <br>";
foreach($arrayCities as $area => $cities) {
    $text = "{$area}: <br>";

    foreach($cities as $city) {
        $text .= " {$city},";
    }
    echo rtrim($text, ',') . ".<br>";
}
echo "<br>";

echo "Задание 3 - альтернативный вариант <br>";
foreach($arrayCities as $area => $cities) {
    $text = "{$area}: <br>";

    $text .= implode(', ', $cities);
    echo "{$text}.<br>";
}
echo "<br>";



// Задание 4. Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
// Написать функцию транслитерации строк. Она должна учитывать и заглавные буквы.

echo "Задание 4 <br>";
$alfabet = [
    'а' => 'a',   'б' => 'b',   'в' => 'v',
    'г' => 'g',   'д' => 'd',   'е' => 'e',
    'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
    'и' => 'i',   'й' => 'y',   'к' => 'k',
    'л' => 'l',   'м' => 'm',   'н' => 'n',
    'о' => 'o',   'п' => 'p',   'р' => 'r',
    'с' => 's',   'т' => 't',   'у' => 'u',
    'ф' => 'f',   'х' => 'h',   'ц' => 'c',
    'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
    'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
    'э' => 'e',   'ю' => 'yu',  'я' => 'ya'
];
$str = 'Привет мир!';

function translator(string $string, array $alfabetArray)
{
    $new_string = '';
    for ($i = 0; $i < mb_strlen($string); $i++) {
        $letter = mb_substr($string, $i, 1);

        if($alfabetArray[mb_strtolower($letter)] === null) {
            $new_string .= $letter;
        } else if($letter === mb_strtoupper($letter)) {
            $new_string .= mb_strtoupper($alfabetArray[mb_strtolower($letter)]);
        } else {
            $new_string .= $alfabetArray[$letter];
        }
    }

    return $new_string;
}

echo "Исходная строка - {$str}<br> Транслитерация этой строки - " . translator($str, $alfabet);
echo "<br><br>";



// Задание 5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку. Можно через str_replace

echo "Задание 5 <br>";
$str = 'За ме н_ а.';

function changeString(string $string)
{
    return str_replace(' ', '_', $string);
}
echo "Исходная строка - {$str}<br> Измененная строка - " . changeString($str);
echo "<br><br>";



// Задание 7. *Вывести с помощью цикла for числа от 0 до 9, не используя тело цикла. Выглядеть должно так:
// for (…){ // здесь пусто}

echo "Задание 7 <br>";
for($i = 0; $i <= 9; print $i++ . ', ');
echo "<br><br>";



// Задание 8. *Повторить третье задание, но вывести на экран только города, начинающиеся с буквы «К».

echo "Задание 8 <br>";
foreach($arrayCities as $area => $cities) {
    $text = "{$area}: <br>";

    foreach($cities as $city) {
        if(mb_substr($city, 0, 1) === 'К') {
            $text .= " {$city},";
        }
    }
    echo rtrim($text, ',') . ".<br>";
}
echo "<br>";



// 9. *Объединить две ранее написанные функции в одну, которая получает строку на русском языке, производит транслитерацию и замену пробелов на подчеркивания (аналогичная задача решается при конструировании url-адресов на основе названия статьи в блогах).

echo "Задание 9 <br>";
function translatorUrl(string $string, array $alfabetArray) 
{
    return changeString(translator($string, $alfabetArray));
}

$str = 'Привет, мир, медвед :-)';
echo "Исходная строка - {$str}<br> Измененная строка - " . translatorUrl($str, $alfabet);