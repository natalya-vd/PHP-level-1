<?php
define('ROOT', dirname(__DIR__));
define('TEMPLATES_DIR', ROOT . '/templates/');
define('MODULES_DIR', 'modules/');
define('IMG_DIR', $_SERVER['DOCUMENT_ROOT'] . '/img/');

require ROOT . "/engine/functions.php";
include ROOT . '/engine/classSimpleImage.php';
require ROOT . "/engine/menu.php";
require ROOT . "/engine/catalog.php";
require ROOT . "/engine/gallery.php";
require ROOT . "/engine/chat.php";