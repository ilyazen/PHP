<div class="container">
<?php foreach ($notes as $key => $value): ?>
<div class="card mb-1">
    <div class="card-header">
        <?php if($value['status'] == "Выполняется"): ?>
            <span class="btn btn-light"><?= $value['status'] ?></span>
        <?php endif; ?>
        <?php if($value['status'] == "Завершено"): ?>
            <span class="btn btn-success"><?= $value['status'] ?></span>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <h5 class="card-title"><?= $value['title'] ?></h5>
        <p class="card-text"><?= $value['prev_descr'] ?></p>
        <a href="index/notes/show?id=<?= $value['id'] ?>" class="btn btn-primary">Подробнее</a>
    </div>
</div>
<?php endforeach; ?>
</div>
