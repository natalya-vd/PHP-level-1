<?php
define('TEMPLATES_DIR', 'templates/');
define('MODULES_DIR', 'modules/');
define('IMG_DIR', 'img/');

$page = 'main';

$menuList = [
    [
        'link' => '/',
        'title' => 'Главная',
    ],
    [
        'link' => 'catalog_ssr',
        'title' => 'Каталог SSR',
    ],
    [
        'link' => 'catalog_spa',
        'title' => 'Каталог SPA',
    ],
    [
        'link' => 'about',
        'title' => 'О нас',
    ],
];

if(isset($_GET['page'])) {
    $page = $_GET['page'];
}

$params = [
    'date' => date ('Y'),
    'menu' => renderTemplate(MODULES_DIR . 'menu', ['menuList' => $menuList]),
];

function getCatalog()
{
    return [
        'catalog' => [
            [
                'name' => 'Суши',
                'price' => 145,
                'image' => IMG_DIR . 'sushi.jpg'
            ],
            [
                'name' => 'Роллы',
                'price' => 478,
                'image' => IMG_DIR . 'rolls.jpg'
            ],
            [
                'name' => 'Чай',
                'price' => 45,
                'image' => IMG_DIR . 'tea.jpg'
            ],
            [
                'name' => 'Кофе',
                'price' => 63,
                'image' => IMG_DIR . 'coffee.jpg'
            ],
        ]
    ];
}

switch($page) {
    case 'main':
        $params['title'] = 'Главная';
        break;
    case 'about':
        $params['title'] = 'О нас';
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

function render($page, $params)
{
    return renderTemplate(MODULES_DIR . 'layout', [
        'title' => $params['title'],
        'main' => renderTemplate($page, $params),
        'header' => renderTemplate(MODULES_DIR . 'header', $params),
        'footer' => renderTemplate(MODULES_DIR . 'footer', $params),
    ]);
}

function renderTemplate($page, $params = [])
{
    ob_start();

    extract($params);

    include TEMPLATES_DIR . $page . '.php';

    return ob_get_clean();
}

echo render($page, $params);