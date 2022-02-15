<main class="container">
  <a class="one-product-back" href="/catalog_ssr">Вернуться в каталог</a>
  <h1>
    <?=$product['name_product']?>
  </h1>
  <div>
    <img src="/img/catalog/<?=$product['path']?>" alt="<?=$product['name_product']?>" width="300" height="200">
    <p>Цена: <?=$product['price']?></p>
    <p><?=$product['description']?></p>
    <button class="button" type="button" data-id="<?=$product['id']?>" data-price="<?=$product['price']?>">Купить</button>
  </div>
  <p>
    Оставить отзыв
  </p>
  <p class="feedback-message">
    <?=$feedbackMessage?>
  </p>
  <form class="product-form" action="/one-product/<?=$actionFeedback?>" method="post">
    <input type="text" name="name_user" placeholder="Ваше имя" value="<?=$feedbackEdit['name']?>">
    <input hidden type="text" name="id_product" value="<?=$_GET['id']?>">
    <input hidden type="text" name="id_feedback" value="<?=$_GET['id_feedback']?>">
    <textarea name="feedback" placeholder="Введите отзыв" rows="5" cols="33"><?=$feedbackEdit['feedback']?></textarea>
    <button class="button" type="submit"><?=$buttonText?></button>
  </form>
  <hr>
  <p>
    Отзывы о товаре
  </p>
  <?=$feedback?>
</main>