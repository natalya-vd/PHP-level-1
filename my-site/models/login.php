<?php
function getUser($nameTable, $login)
{
  return "SELECT * FROM $nameTable WHERE login = '{$login}'";
}

function getHash($nameTable, $hash)
{
  return "SELECT * FROM $nameTable WHERE `hash`='{$hash}'";
}

function addHashForSave($nameTable, $hash, $id)
{
  return "UPDATE $nameTable SET `hash` = '{$hash}' WHERE $nameTable.id = {$id}";
}

function verifyTextInput($text)
{
  return strip_tags(htmlspecialchars($text));
}

function checkAuth($nameTable, $login, $pass, $save = false)
{
  if(auth($nameTable, $login, $pass)) {
    if ($save) {
      $hash = uniqid(rand(), true);
      $id = verifyTextDb(getDb(), $_SESSION['id']);
      $sql = addHashForSave($nameTable, $hash, $id);
      $result = executeSql($sql);
      setcookie("hash", $hash, time() + 3600, '/');
    }

    header("Location: " . $_SERVER['HTTP_REFERER']);
    die();
  } else {
    die('Неверный логин или пароль');
  }
}

function auth($nameTable, $login, $pass)
{
  $result = getOneResult(getUser($nameTable, $login));

  if (password_verify($pass, $result['pass'])) {
    $_SESSION['login'] = $login;
    $_SESSION['id'] = $result['id'];
    return true;
  }
  return false;
}

function is_auth($nameTable)
{
  if(isset($_COOKIE["hash"]) && !isset($_SESSION['login'])){
    $hash = verifyTextInput($_COOKIE["hash"]);
    
    $result = getOneResult(getHash($nameTable, $hash));
    $user = $result['login'];
    
    if (!empty($user)) {
      $_SESSION['login'] = $user;
      $_SESSION['id'] = $result['id'];
    }
  }  
  return isset($_SESSION['login']);
}

function get_user()
{
  return $_SESSION['login'];
}

function logout()
{
  session_destroy();
  setcookie("hash", $_COOKIE["hash"], time() - 3600, '/');
  header("Location: " . $_SERVER['HTTP_REFERER']);
  die();
}

function checkRole($nameTable, $login)
{
  $role = getOneResult("SELECT role FROM $nameTable WHERE login = '{$login}'")['role'];

  if($role === 'admin') {
    return true;
  }

  return false;
}