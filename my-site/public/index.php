<?php
require $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";

$url_array = explode('/', $_SERVER['REQUEST_URI']);

$action = $url_array[2];

if ($url_array[1] == "") {
    $page = 'main';
} else {
    $page = $url_array[1];
}

$params = prepareVariables($page, $action);

echo render($page, $params);
