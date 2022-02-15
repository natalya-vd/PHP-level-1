<?php
function addOrder($nameTable, $session_id) 
{
  $phone = verifyTextDb(getDb(), $_POST['phone']);

  executeSql("INSERT INTO $nameTable(phone, session_id) VALUES ('{$phone}','{$session_id}')");
}