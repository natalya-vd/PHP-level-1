<main class="container">
  <h2>Корзина</h2>
  <div class="cart__wrapper">
    <?php if(!empty($basket)): ?>
    <ul class="cart__list">
      <?php foreach($basket as $good): ?>
      <li class="card-product" data-item="<?=$good['id']?>">
        <div class="card-product__title-wrapper">
          <img class="card-product__img" src="/img/catalog/<?=$good['path']?>" alt="<?=$good['name_product']?>" width="70" height="70">
          <h3 class="card-product__heading">
          <?=$good['name_product']?>
          </h3>
        </div>
        <p>
          <?=$good['price']?>
        </p>
        <p>
          <?=$good['quantity']?>
        </p>
        <p>
          <?=$good['price'] * $good['quantity']?>
        </p>
        <button class="button-delete" type="button" data-basket="<?=$good['id']?>">
          <img src="/img/delete.svg" alt="delete">
        </button>
      </li>
      <?php endforeach; ?>
    </ul>
    <?php else: ?>
    <div class="cart__empty-wrapper">
      <div class="cart__empty">
        Корзина пустая
      </div>
    </div>
    <?php endif; ?>
    <div class="cart__purchase">
      <div class="cart__sum">
        <p>
          Сумма покупки: <span id="sum"><?=$sumBasket?></span>
        </p>
      </div>
      <a class="button" href="/order">Оформить покупку</a>
    </div>
  </div>
  <?php if(!empty($oldBaskets)): ?>
    <h3>
      Ранее оформленные заказы
    </h3>
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
      <?php foreach($oldBaskets as $key => $order): ?>
        <li class="admin-item <?php $key % 2 == 0 ? print 'admin-item-gray': print 'admin-item-green'?>">
        <div class="admin-info">
          <p>Номер заказа: <?=$order['id']?></p>
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
        </div>
      </li>
      <?php endforeach; ?>    
    </ul>
    <?php endif; ?>
</main>