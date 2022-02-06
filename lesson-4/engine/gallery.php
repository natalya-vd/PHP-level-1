<?php
/**
 * Загружаем изображение с формы
 */

$messages = [
    'ok' => 'Файл загружен',
    'error' => 'Файл не загружен',
    'errorType' => 'Неверный формат файла. Можно загрузить изображения в формате jpg',
    'errorSize' => 'Можно загрузить изображение не более 5Мб',
    'errorExtensionFile' => 'Загрузка php файлов запрещена!'
];

$messageText = $messages[$_GET['messageLoad']];

/**
 * Читает содержимое директории. Возвращает данные в виде массива
 */
function getFilesList ($directory)
{
    return array_splice(scandir($directory), 2);
}

function verifyMimeType($errorText)
{
    $imageInfo = getimagesize($_FILES['upload_img']['tmp_name']);

    if($imageInfo['mime'] !== 'image/jpeg') {
        header("Location: /?page=gallery&messageLoad=" . $errorText);
        die();
    }
}

function verifySizeFile($errorText)
{
    if($_FILES['upload_img']['size'] > 1024 * 5 * 1024) {
        header("Location: /?page=gallery&messageLoad=" . $errorText);
        die();
    }
}

function verifyExtensionFile($errorText)
{
    $blacklist = array(".php", ".phtml", ".php3", ".php4");

    foreach ($blacklist as $item) {
        if(preg_match("/$item\$/i", $_FILES['upload_img']['name'])) {
            header("Location: /?page=gallery&messageLoad=" . $errorText);
            die();
        }
    }
}

function loadImage() 
{
    $path = IMG_DIR . '/gallery/big-size/' . $_FILES['upload_img']['name'];

    verifyMimeType('errorType');
    verifySizeFile('errorSize');
    verifyExtensionFile('errorExtensionFile');
    
    if(move_uploaded_file($_FILES['upload_img']['tmp_name'], $path)) {
        $messageLoad = 'ok';
    } else {
        $messageLoad = 'error';
    }

    $image = new SimpleImage();
    $image->load(IMG_DIR . '/gallery/big-size/' . $_FILES['upload_img']['name']);
    $image->resizeToWidth(150);
    $image->save(IMG_DIR . '/gallery/small-size/' . $_FILES['upload_img']['name']);

    header("Location: /?page=gallery&messageLoad=" . $messageLoad);
    die();
}