<?php
include 'func.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Адресная Книга</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col mt-1">
            <?=@$success ?>
            <button class="btn btn-success mb-1" data-toggle="modal" data-target="#Modal"><i class="fa fa-user-plus"></i></button>
            <table class="table shadow ">
                <thead class="thead-dark">
                <tr>
                    <th>№</th>
                    <th>Имя</th>
                    <th>Город</th>
                    <th>Действие</th>

                </tr>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?=$user['id'] ?></td>
                        <td><?=$user['name'] ?></td>
                        <td><?=$user['city_name'] ?></td>
                        <td>
                            <a href="?edit=<?=$user['id'] ?>" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal<?=$user['id'] ?>"><i class="fa fa-edit"></i></a>
                            <a href="?delete=<?=$user['id'] ?>" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?=$user['id'] ?>"><i class="fa fa-trash"></i></a>
                            <?php require 'modal.php'; ?>
                        </td>
                    </tr>
                <?php } ?>
                </thead>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="Modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title">Добавить пользователя</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" value="" placeholder="Имя">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="city">
                            <?php foreach ($cities as $city) { ?>
                                <option value="<?=$city['id']?>"> <?= $city['name']?> </option>
                            <?php } ?>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <button type="submit" name="submit" class="btn btn-primary">Добавить</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
</body>
</html>