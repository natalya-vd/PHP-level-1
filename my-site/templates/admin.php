<main class="container">
  <?php if(!$isAdmin): ?>
    <p>
      Недостаточно прав для просмотра страницы <a class="admin-back" href="/login">авторизуйтесь</a>
    </p>
  <?php else: ?>
    <h2>Список заказов</h2>
    <ul>
      <li class="admin-item admin-item-green">
        <div></div>
        <ul class="admin-product">
            <li class="admin-info-product">
              <p>Наименование товара:</p>
              <p>Цена:</p>
              <p>Количество:</p>
            </li>
          </ul>
          <p>Сумма заказа:</p>
          <p>Статус заказа:</p>
        </li>
      <?php foreach($ordersList as $key => $order): ?>
        <li class="admin-item <?php $key % 2 == 0 ? print 'admin-item-gray': print 'admin-item-green'?>">
        <div class="admin-info">
          <p>Номер заказа: <?=$order['id']?></p>
          <p>Имя: <?=$order['name_user']?></p>
          <p>Телефон: <?=$order['phone']?></p>
        </div>
        <ul class="admin-product">
          <?php foreach($order['productsList'] as $productsList): ?>
          <li class="admin-info-product">
            <p><?=$productsList['name_product']?></p>
            <p><?=$productsList['price']?></p>
            <p><?=$productsList['quantity']?></p>
          </li>
          <?php endforeach; ?>
        </ul>
        <p><?=$order['sum']?></p>
        <div>
          <p data-status-id="<?=$order['id']?>"><?=$order['status']?></p>
          <button data-id="<?=$order['id']?>" type="button" <?php if($order['status'] === 'Заказ оформлен') echo 'disabled' ?>>Оформить заказ</button>
        </div>
      </li>
      <?php endforeach; ?>    
    </ul>
  <?php endif; ?>
</main>