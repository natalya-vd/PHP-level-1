<?php
function getMessagesList($messageText)
{
    $message = strip_tags($messageText);
    $messageList = null;
    $file = fopen(ROOT . '/data/chat.txt', 'a+');

    if(!empty($message)) {
        fputs($file, $message . "\r\n");
        header("Location: /chat");
        die();
    }

    while(!feof($file)) {
        $messageList .= fgets($file) . '<br>';
    }

    return $messageList;
}