<?php
require $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";

$url_array = explode('/', $_SERVER['REQUEST_URI']);

if ($url_array[1] == "") {
    $page = 'main';
} else {
    $page = $url_array[1];
}

/**
 * Дефолтные параметры
 */
$params = [
    'date' => date ('Y'),
];

/**
 * Контроллер
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
        if(is_null(initDb(TABLE_GALLERY))) {
            setupDataDb(getFilesList(IMG_DIR . '/gallery/big-size/'), TABLE_GALLERY, IMG_DIR . 'gallery/big-size/');
        };
        if(!empty($_FILES)) {
            loadImage();
        }
        $params['title'] = 'Галлерея';
        $params['galleryList'] = getImages(TABLE_GALLERY);
        $params['messageText'] = getMessageGallery($_GET['messageLoad']);
        break;

    case 'one-image':
        $id = (int)$_GET['id'];
        addViews(TABLE_GALLERY, $id);
        $params['image'] = getOneImage($id, TABLE_GALLERY);
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
