<?php
function prepareVariables($page, $action = "")
{
  session_start();
  $session_id = session_id();

  $params = [
    'date' => date ('Y'),
    'count' => getOneResult(getCountProductsBasket(TABLE_BASKET, $session_id))
  ];

  if(is_auth(TABLE_USERS)) {
    $params['allow'] = true;
    $params['login'] = get_user();
  }
  
  if(checkRole(TABLE_USERS, $_SESSION['login'])) {    
    $params['isAdmin'] = true;
  }

  if(isset($_SESSION['id'])) {
    $users_id = $_SESSION['id'];
  } else {
    $users_id = 0;
  }

  switch($page) {
  case 'main':
    $params['title'] = 'Главная';
    break;

  case 'gallery':
    if(is_null(initDb(TABLE_GALLERY))) {
      setupDataDb(getFilesList(IMG_DIR . '/gallery/big-size/'), TABLE_GALLERY, IMG_DIR . 'gallery/big-size/');
    };
    if(!empty($_FILES)) {
      loadImage();
    }
    $params['title'] = 'Галлерея';
    $params['galleryList'] = getImages(TABLE_GALLERY);
    $params['messageText'] = getMessageGallery($_GET['messageLoad']);
    break;

  case 'one-image':
    $id = (int)$_GET['id'];
    addViews(TABLE_GALLERY, $id);
    $params['image'] = getOneImage($id, TABLE_GALLERY);
    break;

  case 'catalog_ssr':
    $params['title'] = 'Каталог SSR';
    $params['catalog'] = getProducts(TABLE_PRODUCTS);
    $params['feedbackList'] = getAllFeedback(TABLE_FEEDBACK);
    $params['feedbackControl'] = false;
    break;

  case 'one-product':
    $params['title'] = 'Продукт';
    $id = (int)$_GET['id'];
    $params['product'] = getOneProduct(TABLE_PRODUCTS, $id);
    $params['feedbackList'] = getOneProductFeedback(TABLE_FEEDBACK, $id);
    $params = array_merge($params,  doFeebackAction($action, TABLE_FEEDBACK));
    $params['feedbackControl'] = true;
    $params['feedbackMessage'] = getMessageFeedback($_GET['messageFeedback']);
    break;

  case 'catalog_spa':
    $params['title'] = 'Каталог SPA';
    break;

  case 'login':
    $params['title'] = 'Авторизация';
    if(isset($_GET['logout'])) {
      logout();
    }
    if(isset($_POST['login'])) {
      $login = verifyTextDb(getDb(), $_POST['login']);
      $pass = verifyTextDb(getDb(), $_POST['pass']);
      $save = isset($_POST['save']);
      checkAuth(TABLE_USERS, $login, $pass, $save);
    }
    break;

  case 'basket':
    $params['title'] = 'Корзина';
    $params['basket'] = getAssocResult(getProductsBasket($session_id));
    $params['sumBasket'] = getOneResult(getSumBasket($session_id))['sum'];
    if($users_id !== 0) {
      $params['oldBaskets'] = getProductsOldBaskets($users_id);
    }
    break;

  case 'order':
    if(!getAssocResult(getHashBasket(TABLE_BASKET, $session_id)) && empty($_GET)) {
      header("Location: /order/?messageOrder=error");
      die();
    }
    if($_GET['messageOrder'] === 'preparation') {
      addOrder(TABLE_ORDERS, $session_id, $users_id);
      $session_id = session_regenerate_id();
      header("Location: /order/?messageOrder=ok");
      die();
    }
    break;

  case 'admin':
    if($params['isAdmin']) {
      $params['ordersList'] = getOrders();
    }
    break;

  case 'calculator':
    $params['title'] = 'Калькулятор';
    $params['calculator'] = initCalculator();
    if(!empty($_GET)) {
      $params['calculator'] = calculator((int)$_GET["arg1"], (int)$_GET["arg2"], $_GET['operation']);            
    };
    break;

  case 'chat':
    $params['title'] = 'Чат';
    $params['messages'] = getMessagesList($_GET['message']);
    break;

  case 'apiBasket':
    echo json_encode(doBasketAction($session_id, $users_id), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    die();

  case 'apiAdmin':
    if($params['isAdmin']) {
      echo json_encode(chengeStatusOrder(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
    die();

  case 'apicatalog':
    echo json_encode(getProducts(TABLE_PRODUCTS), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    die();

  case 'apiCalculator':
    $request = getDataPostRequest();
    echo json_encode(calculatorPostRequest($request), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    die();

  default:
    $page = '404';
    break;
  }

  return $params;
}