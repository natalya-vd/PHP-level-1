<?php
function getOrders()
{
  // return getAssocResult("SELECT *
  // FROM `orders` INNER JOIN `basket` 
  // ON orders.session_id = basket.session_id
  // INNER JOIN `products`
  // ON basket.id_product = products.id");

  $orders = getAssocResult("SELECT * FROM `orders` ORDER BY id DESC");
  
  foreach($orders as $key => $order) {
    $productsList['productsList'] = getAssocResult("SELECT basket.price, basket.quantity, products.name_product, products.path 
    FROM `basket` INNER JOIN `products` 
    ON `session_id` = '{$order['session_id']}' AND basket.id_product = products.id");

    $sumBasket = getOneResult(getSumBasket($order['session_id']));
    $orders[$key]['sum'] = $sumBasket['sum'];

    $orders[$key] = array_merge($orders[$key], $productsList);
  }

  return $orders;
}

function chengeStatusOrder()
{
  $request = getDataPostBasket();
  $idOrder = (int)$request['id'];

  executeSql("UPDATE `orders` SET `status`='Заказ оформлен' WHERE `id` = '{$idOrder}'");
  return [
    'status' => 'Заказ оформлен',
  ];
}