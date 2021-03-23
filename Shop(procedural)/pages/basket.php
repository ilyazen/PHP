<?php
if(!empty($_SESSION['basket'])) {
$products = getProducts($link,$_SESSION['basket']);
};
//var_dump($_SESSION['basket']);

?>
<div class="container">
      <?php if (!empty($_SESSION['basket'])): ?>
           <div class="d-flex justify-content-center flex-wrap">         
           <?php foreach ($products as $product): ?>
            <div class="card m-1" style="width: 15rem;">
                  <img  src=<?= $product['img_url']; ?> class="card-img-top" alt="...">
                  <div class="card-body">
                  <h5 class="card-title"><?="{$product['name']}"?></h5>
                  <p class="card-text text"><?="{$product['description']}"?></p>
                  <a href=<?="?page=1&id={$product['id']}"?> class="btn btn-primary mb-1 btn-sm">Подробнее</a>
                  <a href=<?="?page=2&action=delete&id={$product['id']}"?> class="btn btn-primary mb-1 btn-sm">Убрать</a>
            </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
            <h2>В корзине пока пусто</h2>
            <?php endif; ?>
            </div>

   </div>