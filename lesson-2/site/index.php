<?php
// А можно как-то сделать чтобы не все параметры в функцию передавать, я не про значения по умолчанию (что-то типа деструктуризации в JS). Вот я захотела в header вставить menu, из-за этого вынесла в функции renderTemplate параметр $menu на первое место и при сбореке layout передала пустую строку где должно быть $menu. А если у меня потом будет все больше параметров и вложенность переменных в шаблонах будет больше (например захочу еще что-то в $main вложить или вот как сейчас передала переменную с датой). Или может я не так написала саму функцию и нужно было как-то по-другому передавать переменные в шаблоны?

$date = date ('Y');

$menu = renderTemplate("./modules/menu");
$header = renderTemplate("./modules/header", $menu);
$footer = renderTemplate("./modules/footer",  "", "", "", "", $date);

$main = renderTemplate("./pages/main");
$about = renderTemplate("./pages/about");

echo renderTemplate("./modules/layout", "", $main, $header, $footer);

// Это рендер второго шаблона. Помню, что говорили не комментировать, но иначе добавляется второй раз DOCTYPE и вся структура в Html. Роутинг в следующем ДЗ :-)
// echo renderTemplate("./modules/layout", "", $about, $header, $footer);


function renderTemplate($page, $menu = "", $main = "", $header = "", $footer = "", $date = "") {
    ob_start();
    include $page . ".php";
    return ob_get_clean();
};