<main class="container">
  <h1>
    Чат
  </h1>
  <form action="/chat/" method="GET">
    <input type="text" name="message"/>
    <button type="submit">Отправить</button>
  </form>
  <p>
    <?=$messages?>
  </p>
</main>