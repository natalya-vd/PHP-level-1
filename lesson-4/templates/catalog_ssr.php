<main class="container">
    <h2>Каталог SSR</h2>
    <?php foreach($catalog as $item): ?>
        <div>
            <?=$item['name']?><br>
            <img src="<?=$item['image']?>" alt="<?=$item['name']?>" width="300" height="200"><br>
            Цена: <?=$item['price']?><br>
            <button>Купить</button>
            <hr>
        </div>
    <?php endforeach; ?>
</main>

