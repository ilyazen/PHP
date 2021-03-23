<?php
$products = getProducts($link);
$product = null;
$id = null;
//UPDATE `images` SET `view` = '1' WHERE `images`.`id` = 1
if (!empty($_GET['id'])) {
   $id = (int) $_GET['id'];
   foreach ($products as $key => $value) {
      if($value["id"] == $id) {
         $product = $value;
         $product['view'] += 1;
         break;
      } 
   }
   $addView = "UPDATE `products` SET `view` = '{$product['view']}' WHERE `products`.`id` = $id";
   mysqli_query($link, $addView);
}
// Получение комментариев
$comments = getComments($link,$id);
// добавить комментарий

if (!empty($_POST['comment'])) {
   $newComment = $_POST['comment'];
   $addComment = "INSERT INTO `comments` (`id`,`text`, `id_product`) VALUES (NULL,'{$newComment}', {$id})";
   mysqli_query($link, $addComment);
   header("Refresh:0");
}

?>
   <div class="container">
   <div class="d-flex  justify-content-center flex-wrap">
   <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img style="max-width: 180px;" src=<?= $product['img_url']; ?>  alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?="{$product['name']}"?></h5>
        <p class="card-text"><?="{$product['description']}"?></p>
        <p class="card-text"><small class="text-muted">Просмотров: <?="{$product['view']}"?> </small></p>
        <a href="?page=0" class="btn btn-primary mb-1 btn-sm">На главную</a>
        <a href="?page=1&action=add&id=<?=$product['id']?>" class="btn btn-primary mb-1 btn-sm">Добавить</a>
      </div>
    </div>
  </div>
</div>
</div>
<div>
<h2>Комментарии</h2>
<?php foreach ($comments as $comment): ?>
<div class="card text-dark bg-light m-1">
  <div class="card-header"> <?= $product['name'] ?> 
  </div>
  <div class="card-body">
    <p class="card-text"> <?= $comment ?></p>
  </div>
</div>
<?php endforeach; ?>
   </div>
   <form method="POST" class="m-1">
   <div class="input-group">
  <span class="input-group-text">Оставьте комментарий</span>
  <textarea class="form-control" name="comment" aria-label="With textarea"></textarea>
  <button type="submit" class="btn btn-primary">Отправить</button>
</div>

   </form>
   </div>

