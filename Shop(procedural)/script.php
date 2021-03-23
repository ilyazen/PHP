<?php
session_start(); 
//session_destroy();

$link = mysqli_connect('localhost', 'root', '', 'phptest');
function getProducts($link,$setId = 'default') {
   if($setId === 'default') { 
   $selectedProduct = "SELECT id, name, img_url, description, view FROM `products` ORDER BY `products`.`view` DESC";
   }  else {
      $setId = substr($setId,0,-1);
      $selectedProduct = "SELECT id, name, img_url, description, view FROM products WHERE id IN ($setId)";
   }
   $queryProduct =  mysqli_query($link, $selectedProduct);
   $products = [];
   while ($row = mysqli_fetch_assoc($queryProduct)) {
      array_push($products,[
         'id' => $row['id'],
         'name' => $row['name'],
         'img_url' => $row['img_url'],
         'description' => $row['description'],
         'view' =>  $row['view']] );
  };
  return $products;
}
function getComments($link,$id_product) {
   $selectedComment = "SELECT text FROM `comments` 
   WHERE 
`id_product` = {$id_product}";
$queryComment =  mysqli_query($link, $selectedComment);

$comments = [];
while ($row = mysqli_fetch_assoc($queryComment)) {
   array_push($comments,
      $row['text']
   );
};

return $comments;
};


?>