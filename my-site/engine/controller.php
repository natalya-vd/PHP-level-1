<?php
function prepareVariables($page, $action = "", $messageList)
{
  $params = [
    'date' => date ('Y'),
  ];

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