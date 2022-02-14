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

function verifyHash($pass)
{
  return password_hash($pass, PASSWORD_DEFAULT);
}

function unVerifyHash($pass, $hash)
{
  return password_verify($pass, $hash);
}

function verifyTextInput($text)
{
  return strip_tags(htmlspecialchars($text));
}

function addCookie($name, $value, $time)
{
  return setcookie($name, $value, time() + $time, '/');
}

function deleteCookie($name, $value, $time)
{
  return setcookie($name, $value, time() - $time, '/');
}

function addSession($name, $value)
{
  return $_SESSION[$name] = $value;
}

function deleteSession()
{
  return session_destroy();
}

function checkAuth($nameTable, $login, $pass, $save = false)
{
  if(auth($nameTable, $login, $pass)) {

    if ($save) {
      $hash = uniqid(rand(), true);
      $id = verifyTextDb(getDb(), $_SESSION['id']);
      $sql = addHashForSave($nameTable, $hash, $id);
      $result = executeSql($sql);
      addCookie("hash", $hash, 3600);
    }

    header("Location: " . $_SERVER['HTTP_REFERER']);
    return [
      'allow' => true,
      'login' => $login,
    ];
    die();
  }

  return [
    'allow' => false,
  ];
  die('Неверный логин или пароль');
}

function auth($nameTable, $login, $pass)
{
  $sql = getUser($nameTable, $login);
  $result = getOneResult($sql);

  if (unVerifyHash($pass, $result['pass'])) {
    addSession('login', $login);
    addSession('id', $result['id']);
    return true;
  }
  return false;
}

function is_auth($nameTable, $hash)
{
  $sql = getHash($nameTable, $hash);
  $result = getOneResult($sql);
  $user = $result['login'];

  if (!empty($user)) {
    addSession('login', $user);
    addSession('id', $result['id']);
  }
  
  return isset($_SESSION['login']) ? checkSession($_SESSION['login']) : [];
}

function get_user()
{
  return $_SESSION['login'];
}

function checkSession($login)
{
  return [
    'allow' => true,
    'login' => $login,
  ];
}

function checkCookie($login)
{
  return [
    'allow' => true,
    'login' => $login,
  ];
}

function logout($login)
{
  deleteSession();
  deleteCookie("hash", $_COOKIE["hash"], 3600);
  header("Location: " . $_SERVER['HTTP_REFERER']);
  return [
    'allow' => false,
  ];
  die();
}

