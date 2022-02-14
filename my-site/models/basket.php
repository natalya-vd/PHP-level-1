<?php
function doBasketAction($session_id)
{
  $request = getDataPostBasket();

  switch($request['action']) {
    case 'delete':
      if($session_id === getOneResult(getHashProductBasket(TABLE_BASKET, $request['id']))['session_id']) {
        executeSql(deleteProductBasket(TABLE_BASKET, $request['id']));
        header("Location: /basket");
        return ['status' => 'ok'];
        die();
      } else {
        die('Нет такого товара в корзине');
      }

    case 'add':
      $sql = addProductBasket(TABLE_BASKET, $request['id'], $request['price'], $session_id);
      executeSql($sql);
      header("Location: " . $_SERVER['HTTP_REFERER']);
      return ['status' => 'ok'];
      die();

    default:
    return ['status' => 'error'];
    die();
  }

  return ['status' => 'ok'];
}

function getDataPostBasket()
{
  $request = json_decode(file_get_contents('php://input'));

  foreach($request as $key => $value) {
    $data[$key] = $value;
  }

  header("Content-type: application/json");
  return $data;
}

function addProductBasket($nameTable, $id_product, $price, $session_id)
{
  return "INSERT INTO $nameTable(id_product, price, session_id) VALUES ('{$id_product}','{$price}', '{$session_id}')";
}

function deleteProductBasket($nameTable, $id_basket)
{
  return "DELETE FROM $nameTable WHERE id = {$id_basket}";
}

function getProductsBasket($session_id)
{
  return "SELECT basket.id, basket.id_product, basket.price, basket.quantity, basket.session_id, products.name_product, products.path FROM `basket`, `products` WHERE `session_id` = '{$session_id}' AND basket.id_product = products.id";
}

function getSumBasket($session_id)
{
  return "SELECT SUM(basket.price) as sum FROM `basket` WHERE `session_id` = '{$session_id}'";
}

function getCountProductsBasket($nameTable, $session_id)
{
  return "SELECT count(id) as count FROM $nameTable WHERE `session_id` = '{$session_id}'";
}

function getHashProductBasket($nameTable, $id_basket)
{
  return "SELECT session_id FROM $nameTable WHERE `id` = '{$id_basket}'";
}

function getHashBasket($nameTable, $session_id)
{
  return "SELECT * FROM $nameTable WHERE `session_id` = '{$session_id}'";
}