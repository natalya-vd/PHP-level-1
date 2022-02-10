<?php
function getMessageGallery($messageText)
{
    $messages = [
        'ok' => 'Файл загружен',
        'error' => 'Файл не загружен',
        'errorType' => 'Неверный формат файла. Можно загрузить изображения в формате jpg',
        'errorSize' => 'Можно загрузить изображение не более 5Мб',
        'errorExtensionFile' => 'Загрузка php файлов запрещена!'
    ];

    return $messages[$messageText];
}

function getImages($nameTable) {
    return getAssocResult("SELECT id, name FROM $nameTable ORDER BY `quantity_views` DESC");
}

function getOneImage($id, $nameTable) {
    return getOneResult("SELECT name, quantity_views FROM {$nameTable} WHERE id = {$id}");
}

function addViews($nameTable, $id)
{
    return executeSql("UPDATE $nameTable SET `quantity_views`= `quantity_views` + 1 WHERE id = {$id}");
}

function addImage($nameTable, $value, $pathDirectory)
{
    $size = getFileSize($pathDirectory . $value);

    return executeSql("INSERT INTO $nameTable(name, size) VALUES ('$value', '$size')");
}

function verifyMimeType($errorText)
{
    $imageInfo = getimagesize($_FILES['upload_img']['tmp_name']);

    if($imageInfo['mime'] !== 'image/jpeg') {
        header("Location: /gallery/?messageLoad=" . $errorText);
        die();
    }
}

function verifySizeFile($errorText)
{
    if($_FILES['upload_img']['size'] > 1024 * 5 * 1024) {
        header("Location: /gallery/?messageLoad=" . $errorText);
        die();
    }
}

function verifyExtensionFile($errorText)
{
    $blacklist = array(".php", ".phtml", ".php3", ".php4");

    foreach ($blacklist as $item) {
        if(preg_match("/$item\$/i", $_FILES['upload_img']['name'])) {
            header("Location: /gallery/?messageLoad=" . $errorText);
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
        addImage(TABLE_GALLERY, $_FILES['upload_img']['name'], IMG_DIR . 'gallery/big-size/');

        $messageLoad = 'ok';
    } else {
        $messageLoad = 'error';
    }

    $image = new SimpleImage();
    $image->load(IMG_DIR . '/gallery/big-size/' . $_FILES['upload_img']['name']);
    $image->resizeToWidth(150);
    $image->save(IMG_DIR . '/gallery/small-size/' . $_FILES['upload_img']['name']);

    header("Location: /gallery/?messageLoad=" . $messageLoad);
    die();
}