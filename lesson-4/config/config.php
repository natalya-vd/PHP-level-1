<?php
define('TEMPLATES_DIR', 'templates/');
define('MODULES_DIR', 'modules/');
define('IMG_DIR', '/public/img/');
define('ROOT', $_SERVER['DOCUMENT_ROOT']);

require ROOT . "/engine/functions.php";
require ROOT . "/engine/menu.php";
require ROOT . "/engine/catalog.php";
require ROOT . "/engine/gallery.php";
require ROOT . "/engine/chat.php";