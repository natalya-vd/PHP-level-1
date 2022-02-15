<nav class="nav">
    <ul class="nav__list">
        <?php foreach($menuList as $value): ?>
            <?php if($value['link'] === '/basket'): ?>
            <li>
                <a href="<?=$value['link']?>">
                    <?=$value['title']?>
                    <span id="count">(<?=$value['count']?>)</span>
                </a>
            </li>
            <?php else:?>
            <li>
                <a href="<?=$value['link']?>">
                    <?=$value['title']?>
                </a>
            </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</nav>