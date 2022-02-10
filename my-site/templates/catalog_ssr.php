<main class="container">
    <h2>Каталог SSR</h2>
    <ul class="catalog-list">
        <?php foreach($catalog as $item): ?>
            <li class="catalog-item">
                <a class="catalog-link" href="/one-product/?id=<?=$item['id']?>">
                    <img src="/img/catalog/<?=$item['path']?>" alt="<?=$item['name_product']?>" width="300" height="200">
                    <div class="catalog-inner">
                        <h3><?=$item['name_product']?></h3>
                        <p>Цена: <?=$item['price']?></p>
                        <button class="button" type="button">Купить</button>
                    </div>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <hr>
    <p>
        Последние отзывы о товарах
    </p>
    <?=$feedback?>
</main>

