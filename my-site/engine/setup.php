<?php
function getFilesList($directory)
{
  return array_splice(scandir($directory), 2);
}

function getFileSize($filePath)
{
  return filesize($filePath);
}

function setupDataDb($fileList, $nameTable, $pathDirectory)
{
  foreach($fileList as $value) {
    addImage($nameTable, $value, $pathDirectory);
  }
}

function initDb($nameTable)
{
  return getOneResult("SELECT * FROM {$nameTable}");
}
