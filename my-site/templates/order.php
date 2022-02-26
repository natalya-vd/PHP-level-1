<main class="container">
  <?php if($_GET['messageOrder'] === 'ok'): ?>
    <p>
      Заказ оформлен
    </p>
  <?php elseif($_GET['messageOrder'] === 'error'): ?>
    <p>
      Вы еще ничего не добавили в корзину.
    </p>
    <a class="one-product-back" href="/catalog_ssr">Перейти к оформлению товаров</a>
  <?php else: ?>
  <form action="/order/?messageOrder=preparation" method="post">
    <p>
      Для оформления заказа введите номер телефона и Ваше имя, по которому с Вами свяжется наш менеджер.
    </p>
    <input type="text" name="name_user" placeholder="Имя">
    <input type="text" name="phone" placeholder="Телефон">
    <button class="button" type="submit">Оформить заказ</button>
  </form>
  <?php endif; ?>
</main>