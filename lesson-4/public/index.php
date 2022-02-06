<?php
require $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";

$page = 'main';

/**
 * Устанавливаем имя страницы
 */
if(isset($_GET['page'])) {
    $page = $_GET['page'];
}

/**
 * Дефолтные параметры
 */
$params = [
    'date' => date ('Y'),
];

/**
 * Роуты
 */
switch($page) {
    case 'main':
        $params['title'] = 'Главная';
        break;

    case 'chat':
        $params['title'] = 'Чат';
        $params['messages'] = $messageList;
        break;

    case 'gallery':
        if(!empty($_FILES)) {
            loadImage();
        }
        $params['title'] = 'Галлерея';
        $params['galleryList'] = getFilesList(IMG_DIR . '/gallery/big-size');
        $params['messageText'] = $messageText;
        break;

    case 'catalog_ssr':
        $params['title'] = 'Каталог SSR';
        $params['catalog'] = getCatalog()['catalog'];
        break;

    case 'catalog_spa':
        $params['title'] = 'Каталог SPA';
        break;

    case 'apicatalog':
        echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        die();

    default:
        $page = '404';
        break;
}

/**
 * Отображаем собранную из шаблонов страницу в браузере 
 */
echo render($page, $params);
