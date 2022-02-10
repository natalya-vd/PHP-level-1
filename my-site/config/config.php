<?php
define('ROOT', dirname(__DIR__));
define('TEMPLATES_DIR', ROOT . '/templates/');
define('MODULES_DIR', 'modules/');
define('IMG_DIR', $_SERVER['DOCUMENT_ROOT'] . '/img/');

define('HOST', 'localhost');
define('USER', 'user');
define('PASS', '12345');
define('DB', 'shop');
define('TABLE_GALLERY', 'gallery');
define('TABLE_PRODUCTS', 'products');
define('TABLE_FEEDBACK', 'feedbacks');

require ROOT . "/engine/db.php";
require ROOT . "/engine/controller.php";
require ROOT . "/models/setup.php";
require ROOT . "/engine/render.php";
include ROOT . '/engine/classSimpleImage.php';
require ROOT . "/models/menu.php";
require ROOT . "/models/catalog.php";
require ROOT . "/models/feedback.php";
require ROOT . "/models/gallery.php";
require ROOT . "/models/chat.php";
include ROOT . "/models/calculator.php";