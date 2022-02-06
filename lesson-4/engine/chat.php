<?php
/**
 * Мини чат
 */
$message = strip_tags($_GET['message']);
$messageList = null;
$file = fopen(ROOT . '/data/chat.txt', 'a+');

if(!empty($message)) {
    fputs($file, $message . "\r\n");
    header("Location: /?page=chat");
    die();
}

while(!feof($file)) {
    $messageList .= fgets($file) . '<br>';
}