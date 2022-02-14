<main class="container">
  <div class="login">
    <?php if(!$allow): ?>
    <div>
      <p>
        Для регистрации придумайте логин и пароль
      </p>
      <form action="" name="registration" method="post">
        <div class="login-inner">
          <input type="text" placeholder="Введите имя" name="login">
          <input type="password" placeholder="Введите пароль" name="pass">
          <label>
            <input type="checkbox" name="save">
            <span>Сохранить?</span>
          </label>
        </div>
        <button class="button" type="submit">Регистрация</button>
      </form>
    </div>
    <div>
      <p>
        Если Вы уже зарегистрированы, введите логин и пароль
      </p>
      <form action="" name="authentication" method="post">
        <div class="login-inner">
          <input type="text" placeholder="Введите имя" name="login">
          <input type="password" placeholder="Введите пароль" name="pass">
          <label>
            <input type="checkbox" name="save">
            <span>Сохранить?</span>
          </label>
        </div>
        <button class="button" type="submit">Войти</button>
      </form>
    </div>
    <?php else: ?>
      <div>
        Добро пожаловать <?=$login?>
      </div>
      <a href="/login/?logout">Выйти</a>
    <?php endif; ?>
  </div>
</main>