<nav class="nav">
    <ul class="nav__list">
        <?php foreach($menuList as $value): ?>
            <li>
                <a href="<?=$value['link'] === '/' ? '/' : "/?page={$value['link']}"?>">
                    <?=$value['title']?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>