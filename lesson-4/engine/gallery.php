<?php
/**
 * Загружаем изображение с формы
 */
include ROOT . '/engine/classSimpleImage.php';

$messages = [
    'ok' => 'Файл загружен',
    'error' => 'Файл не загружен'
];

if(!empty($_FILES)) {
    $path = ROOT . '/public/img/gallery/big-size/' . $_FILES['upload_img']['name'];

    //проверить можно ли грузить файл на сервер

    if(move_uploaded_file($_FILES['upload_img']['tmp_name'], $path)) {
        $messageLoad = 'ok';
    } else {
        $messageLoad = 'error';
    }

    $image = new SimpleImage();
    $image->load(ROOT . '/public/img/gallery/big-size/' . $_FILES['upload_img']['name']);
    $image->resizeToWidth(150);
    $image->save(ROOT . '/public/img/gallery/small-size/' . $_FILES['upload_img']['name']);

    header("Location: /?page=gallery&messageLoad=" . $messageLoad);
    die();
}

$messageText = $messages[$_GET['messageLoad']];

/**
 * Читает содержимое директории. Возвращает данные в виде массива
 */
function getFilesList ($directory)
{
    return array_splice(scandir($directory), 2);
}