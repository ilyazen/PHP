<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="/public/scripts/jquery.js"></script>
    <script src="/public/scripts/form.js"></script>
    <title><?php echo $title; ?></title>
</head>
<body>
<nav class="navbar navbar-expand-sm justify-content-center the-navbar">
    <a class="m-2" href="/ToDoList">Главная</a>
    <a class="m-2" href="/ToDoList/index/notes/add">Добавить заметку</a>
</nav>
<?php echo $content; ?>
</body>
</html>
