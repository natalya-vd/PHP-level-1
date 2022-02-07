<?php
/**
 * Функция для соединения с БД
 */
function getDb() 
{
  static $db = null;
  if (is_null($db)) {
    $db = @mysqli_connect(HOST, USER, PASS, DB) or die("Ошибка соединения с базой данных: " . mysqli_connect_error());
  }

  return $db;
}

/**
 * Функция, для получения массива данных из БД
 */
function getAssocResult($sql) 
{
  $result = @mysqli_query(getDb(), $sql) or die(mysqli_error(getDb()));
  $array_result = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $array_result[] = $row;
  }

  return $array_result;
}

/**
 * Функция, для получения из БД данных по 1 строке
 */
function getOneResult($sql) 
{
  $result = @mysqli_query(getDb(), $sql) or die(mysqli_error(getDb()));
  return mysqli_fetch_assoc($result);
}

/**
 * Функция, которая возвращает количество строк
 */
function executeSql($sql) 
{
  @mysqli_query(getDb(), $sql) or die(mysqli_error(getDb()));
  return mysqli_affected_rows(getDb());
}