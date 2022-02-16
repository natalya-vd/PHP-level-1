<?php
function addOrder($nameTable, $session_id, $users_id) 
{
  $phone = verifyTextDb(getDb(), $_POST['phone']);
  $name_user = verifyTextDb(getDb(), $_POST['name_user']);

  executeSql("INSERT INTO $nameTable(name_user, phone, session_id, users_id) VALUES ('{$name_user}', '{$phone}','{$session_id}', '{$users_id}')");
}