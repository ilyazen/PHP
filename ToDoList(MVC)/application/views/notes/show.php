<div class="container">
<?php foreach ($notes as $key => $value): ?>
<div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
                <?php if($value['status'] == "Выполняется"): ?>
                <span class="btn btn-primary"><?= $value['status'] ?></span>
                <?php endif; ?>
                <?php if($value['status'] == "Завершено"): ?>
                    <span class="btn btn-success"><?= $value['status'] ?></span>
                <?php endif; ?>

            </li>
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="#">Ссылка</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                Статус: --><?//= $value['status'] ?>
<!--            </li>-->
        </ul>
    </div>
    <div class="card-body">
        <h5 class="card-title"><?= $value['title'] ?></h5>
        <p class="card-text"><?= $value['descr'] ?></p>
        <a href="/ToDoList" class="btn btn-primary">На главную</a>
        <?php if($value['status'] == "Выполняется"): ?>
        <a href="index/notes/done?id=<?= $value['id'] ?>" class="btn btn-success">Завершить</a>
        <?php endif; ?>
        <a href="index/notes/delete?id=<?= $value['id'] ?>" class="btn btn-danger">Удалить</a>
    </div>
</div>
<?php endforeach; ?>
</div>
