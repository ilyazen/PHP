<?php 



?>

<div class="container">
<form method="POST">
  <div class="mb-3">
    <label class="form-label">Название</label>
    <input type="text" class="form-control" name="product_name" aria-describedby="Help">
    
  </div>
  <div class="mb-3">
    <label class="form-label">Url картинки</label>
    <input type="text" class="form-control" name="img_url" aria-describedby="Help">
    
  </div>
  <div class="mb-3">
    <label class="form-label">Описание</label>
    <textarea class="form-control" name="description" rows="3"></textarea>
  </div>    

  <button type="submit" class="btn btn-primary">Добавить</button>

</form>
</div>