<?php
require_once "script.php";
$header = include 'components/header.php';

// Подключение страниц
$pages = include_once ('engine/pages.php');
$page = '0';
if (!empty($_GET['page'])) {
      $page = (int)$_GET['page'];
}
$file = 'main';
if (!empty($pages[$page])) {
      $file = $pages[$page];
}
$file = __DIR__ . '/pages/' . $file . '.php';
if (!file_exists($file)) {
    $file = __DIR__ . '/page/main.php';
}
//добавление в корзину
if (!empty($_GET['action']) && $_GET['action']=="add") {
      if(stristr($_SESSION['basket'], $_GET['id']) === FALSE) {
            $_SESSION['basket'] .= $_GET["id"].",";
      }
     
}
//удаление из корзины
if (!empty($_GET['action']) && $_GET['action']=="delete") {
      $currentProduct = explode(",",$_SESSION['basket']);
      $deleteId = [$_GET["id"]];
      $resultDelete = array_diff($currentProduct, $deleteId);
      $resultDelete = implode ("," ,$resultDelete);
      $_SESSION['basket'] = $resultDelete;
      header("Location:?page=2");
}
//регистрация
if ($_SERVER['REQUEST_METHOD'] == "POST" && $_GET['action']=="reg") {
      if(!empty($_POST['name']) && !empty($_POST['password'])){
           $insertUser = "INSERT INTO users (id, name, password) VALUES (NULL, '{$_POST['name']}', '{$_POST['password']}')";
            if(mysqli_query($link, $insertUser)) {
                  echo '<div class="alert alert-success" role="alert">
                  Успешно!
                </div>';
            };
      }
}
// авторизация 
if ($_SERVER['REQUEST_METHOD'] == "POST" && $_GET['action']=="in") {
      if(!empty($_POST['name']) && !empty($_POST['password'])){
           $selectUser = "SELECT id,name,password FROM users WHERE name='{$_POST['name']}'";
           $res = mysqli_query($link, $selectUser);
           $user = mysqli_fetch_assoc($res);
           $password = $user['password'];
           if ($user !== NULL && $password == $_POST['password']) {
            $_SESSION['login'] = true;
            $_SESSION['userName'] = $user['name'];
            header('Location:?page=0');
            } else {
                  echo '<div class="alert alert-danger" role="alert">
                  Неверный логин или пароль!
                </div>';
            }
      }
}
// выход из аккаунта
if (!empty($_GET['action']) && $_GET['action']=="out") {
      $_SESSION['login'] = FALSE;
      $_SESSION['userName'] = '';
      header('Location:?page=0');
}
// администрирование
if (!empty($_GET['action']) && $_GET['action']=="admin") {
      $_SESSION['admin'] = TRUE;
      header('Location:?page=0');
}
// админ,добавление товара
if ($_SERVER['REQUEST_METHOD'] == "POST" && $_GET['action']=="addproduct") {
      if(!empty($_POST['product_name']) && !empty($_POST['img_url']) && !empty($_POST['description']) ){
           //$insertProduct = "INSERT INTO prodcuts (id, name, password) VALUES (NULL, '{$_POST['name']}', '{$_POST['password']}')";
           $insertProduct = "INSERT INTO products (id, name, img_url, description) 
           VALUES (NULL, '{$_POST['product_name']}', '{$_POST['img_url']}', '{$_POST['description']}')";
           

            if(mysqli_query($link, $insertProduct)) {
                  echo '<div class="alert alert-success" role="alert">
                  Успешно!
                </div>';
            } ;
      }
}
// админ,удаление товара
if (!empty($_GET['action']) && $_GET['action']=="deleteProduct") {
      $deleteProductId = $_GET["id"];
      $deleteProduct = "DELETE FROM products WHERE products.id = '{$deleteProductId}'";
      mysqli_query($link, $deleteProduct);
      header("Location:?page=0");
}
// админ выход
if (!empty($_GET['action']) && $_GET['action']=="outAdmin") {
      $_SESSION['admin'] = FALSE;
      header('Location:?page=0');
}

ob_start();
include $file;
$content = ob_get_clean();


?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>      
      <?= $header ?>
      <?= $content ?>
      <style>
      .text {
            font-size:12px;
      }
      </style>
</body>
</html>