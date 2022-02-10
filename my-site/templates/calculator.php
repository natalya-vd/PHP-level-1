<main class="container">
  <h1>
    Калькулятор
  </h1>
  <h2>
    Задание 1
  </h2>
  <p>
    <?= $calculator['errorOperation']?>
  </p>
  <form action="/calculator/">
    <div>
      <input type="text" name="arg1" value="<?=$calculator['arg1']?>"/>
      <select name="operation">
        <option value="sum" <?php if($_GET['operation'] === 'sum') echo 'selected'?>>+</option>
        <option value="subtraction" <?php if($_GET['operation'] === 'subtraction') echo 'selected'?>>-</option>
        <option value="multiplication" <?php if($_GET['operation'] === 'multiplication') echo 'selected'?>>*</option>
        <option value="division" <?php if($_GET['operation'] === 'division') echo 'selected'?>>/</option>
      </select>
      <input type="text" name="arg2" value="<?=$calculator['arg2']?>"/>
      <button type="submit">=</button>
      <input readonly type="text" name="result" value="<?=$calculator['result']?>"/>
    </div>
  </form>
  <h2>
    Задание 2
  </h2>
  <form action="/calculator" id="post-form" name="task_2">
    <div class="calculator-wrapper">
      <span class="result-wrapper" id="result"></span>
      <input class="calculator-input" id="calculator-input" type="text" placeholder="0" name="input">
      <input id="input-hidden" type="hidden" name="operation">
      <div class="calculator-button-group">
        <button class="calculator-button" data-operation="8" type="button">8</button>
        <button class="calculator-button" data-operation="9" type="button">9</button>
        <button class="calculator-button color-yellow" data-operation="+" type="button">+</button>
        <button class="calculator-button" data-operation="6" type="button">6</button>
        <button class="calculator-button" data-operation="7" type="button">7</button>
        <button class="calculator-button color-yellow" data-operation="-" type="button">-</button>
        <button class="calculator-button" data-operation="4" type="button">4</button>
        <button class="calculator-button" data-operation="5" type="button">5</button>
        <button class="calculator-button color-yellow" data-operation="*" type="button">*</button>
        <button class="calculator-button" data-operation="2" type="button">2</button>
        <button class="calculator-button" data-operation="3" type="button">3</button>
        <button class="calculator-button color-yellow" data-operation="/" type="button">/</button>
        <button class="calculator-button" data-operation="0" type="button">0</button>
        <button class="calculator-button" data-operation="1" type="button">1</button>
        <button class="calculator-button color-yellow" id="btn-result" type="submit">=</button>
      </div>
    </div>
  </form>
</main>