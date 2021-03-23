<?php 
$isRegistration = FALSE;
if (!empty($_GET['action']) && $_GET['action']=="in") {
  $isRegistration = FALSE;
}
if (!empty($_GET['action']) && $_GET['action']=="reg") {
  $isRegistration = TRUE;
}


?>

<div class="container">
<form method="POST">
  <div class="mb-3">
    <label class="form-label">Имя</label>
    <input type="text" class="form-control" name="name" aria-describedby="Help">
    <div id="Help" class="form-text">Введите ваше имя</div>
  </div>
  <div class="mb-3">
    <label  class="form-label">Пароль</label>
    <input type="text" name="password" class="form-control">
  </div>
  <?php if ($isRegistration): ?>
  <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
  <?php else: ?>
  <button type="submit" class="btn btn-primary">Войти</button>
  <?php endif; ?>
</form>
</div>