<?php 
$products = getProducts($link);
$isAuth = FALSE;
$isAdmin = FALSE; 
if(!empty($_SESSION) && $_SESSION['login'] == TRUE) {
      $isAuth = TRUE;
} else {
      $isAuth = FALSE; 
}
if(!empty($_SESSION) && $_SESSION['admin'] == TRUE) {
      $isAdmin = TRUE;
} else {
      $isAdmin = FALSE; 
}
?>

<div class="navbar navbar-expand-sm justify-content-center the-navbar">
<?php if ($isAuth): ?>
<p> Привет, <?= $_SESSION['userName'] ?> <a class="m-2" href="?page=0&action=out">Выйти</a></p>


<?php else: ?>
<a class="m-2" href="?page=3&action=reg">Зарегистрироваться</a>
<a class="m-2" href="?page=3&action=in">Войти</a>
<?php endif; ?>
</div>
<div class="container">
            <?php if ($isAdmin): ?>
            <ul>
            <h4>Режим администратора</h4>
            <li><a class="m-2" href="?page=4&action=addproduct">Добавить товар</a></li>
            <li><a class="m-2" href="?page=0&action=outAdmin">Выйти</a></li>
            </ul>
            <?php endif; ?>
           <div class="d-flex justify-content-center flex-wrap">         
           <?php foreach ($products as $product): ?>
            <div class="card m-1" style="width: 15rem;">
                  <img  src=<?= $product['img_url']; ?> class="card-img-top" alt="...">
                  <div class="card-body">
                  <h5 class="card-title"><?="{$product['name']}"?></h5>
                  <p class="card-text text"><?="{$product['description']}"?></p>
                  <p>Просмотров: <?="{$product['view']}"?> </p>
                  <a href=<?="?page=1&id={$product['id']}"?> class="btn btn-primary mb-1 btn-sm">Подробнее</a>
                  <a href="?page=0&action=add&id=<?=$product['id']?>" class="btn btn-primary mb-1 btn-sm">Добавить</a>
                  <?php if ($isAdmin): ?>
                        <a href="?page=0&action=deleteProduct&id=<?=$product['id']?>" class="btn btn-danger mb-1 btn-sm">Удалить</a>
                  <?php endif; ?>
            </div>
            </div>
            <?php endforeach; ?>
            </div>

   </div>