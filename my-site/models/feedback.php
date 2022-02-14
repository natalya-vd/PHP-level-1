<?php
function getMessageFeedback($messageText)
{
    $messages = [
        'ok' => 'Отзыв загружен',
        'save' => 'Отзыв сохранен',
        'delete' => 'Отзыв удален'
    ];

    return $messages[$messageText];
}

function getAllFeedback($nameTable) 
{
  return getAssocResult("SELECT * FROM $nameTable ORDER BY id DESC");
}

function getOneProductFeedback($nameTable, $id) 
{
  return getAssocResult("SELECT * FROM $nameTable WHERE id_product = {$id} ORDER BY id DESC");
}

function addFeedBack($nameTable) 
{
  $name = verifyTextDb(getDb(), $_POST['name_user']);
  $feedback = verifyTextDb(getDb(), $_POST['feedback']);
  $id_product = (int)verifyTextDb(getDb(), $_POST['id_product']);

  executeSql("INSERT INTO $nameTable(name, feedback, id_product) VALUES ('{$name}','{$feedback}', '{$id_product}')");
  
  header("Location: /one-product/?id={$id_product}&messageFeedback=ok");
  die();
}

function editFeedBack($nameTable)
{
  $id = (int)$_GET['id_feedback'];
  $row = getOneResult("SELECT * FROM $nameTable WHERE id = {$id}");

  return [
    'feedbackEdit' => $row,
    'actionFeedback' => 'save',
    'buttonText' => 'Изменить',
  ];

  header("Location: /one-product/?id={$id}&messageFeedback=edit");
  die();
}

function saveFeedBack($nameTable)
{
  $id = (int)$_POST['id_product'];
  $id_feedback = (int)$_POST['id_feedback'];
  $name = verifyTextDb(getDb(), $_POST['name_user']);
  $feedback = verifyTextDb(getDb(), $_POST['feedback']);

  executeSql("UPDATE $nameTable SET name='{$name}', feedback='{$feedback}' WHERE id = {$id_feedback}");

  header("Location: /one-product/?id={$id}&messageFeedback=save");
  die();
}

function deleteFeedBack($nameTable) 
{
  var_dump($_GET);
  $id_feedback = (int)$_GET['id_feedback'];
  $id = (int)$_GET['id'];

  executeSql(" DELETE FROM $nameTable WHERE id = {$id_feedback}");

  header("Location: /one-product/?id={$id}&messageFeedback=delete");
  die();
}

function doFeebackAction($action, $nameTable) 
{
  if ($action == "add") {
    addFeedBack($nameTable);
  }
  if ($action == "edit") {
    return editFeedBack($nameTable);
  }
  if ($action == "delete") {
    deleteFeedBack($nameTable);
  }
  if ($action == "save") {
    saveFeedBack($nameTable);
  }
  return [
    'feedbackEdit' => [],
    'actionFeedback' => 'add',
    'buttonText' => 'Отправить',
  ];
}