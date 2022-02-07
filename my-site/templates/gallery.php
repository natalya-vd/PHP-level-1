<main class="container">
<h1>
  Галлерея
</h1>
  <p>
    <?=$messageText?>
  </p>
  <form class="form" method="post" enctype="multipart/form-data">
    <input type="file" name="upload_img">
    <button type="submit">Загрузить</button>
  </form>

  <ul class="gallery-list">
    <?php foreach($galleryList as $value): ?>
    <li>
      <a href="/one-image/?id=<?=$value['id']?>">
        <img src="/img/gallery/small-size/<?=$value['name']?>" alt="<?=$value['name']?>">
      </a>
    </li>
    <?php endforeach; ?>
  </ul>
</main>