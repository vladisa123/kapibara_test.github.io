<?php
include 'config.php';

@$name = $_POST['name'];
if ($name == ""){
    $name = NULL;
}

@$city = (int)$_POST['city'];

// Create User
if (isset($_POST['submit'])) {
    try {
        $sql = ("INSERT INTO `users`(`name`,`city`) VALUES(?,?)");
        $query = $pdo->prepare($sql);
        $query->execute([$name, $city]);
        $success = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Данные успешно отправлены!</strong> Вы можете закрыть это сообщение.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>';
    } catch (Exception $e) {
        $success = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>Пустые начения не допустимы!</strong> Вы можете закрыть это сообщение.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>';
    }
}




// Read User
$sql = $pdo->prepare("SELECT users.id, users.name, users.city, city.id AS city_id,  city.name AS city_name FROM users
   LEFT JOIN cities city on users.city = city.id
   GROUP BY users.id");

$sql->execute();
$users = $sql->fetchAll();

// Read Cities
$sql = $pdo->prepare("SELECT * FROM `cities`");
$sql->execute();
$cities = $sql->fetchAll();



// Update Client
@$edit_name = $_POST['edit_name'];
if ($edit_name == ""){
    $edit_name = NULL;
}
@$edit_city = (int)$_POST['edit_city'];
@$get_id = $_GET['id'];

if (isset($_POST['edit-submit'])) {
    try {
        $sqll = "UPDATE users SET name=?, city=? WHERE id=?";
        $querys = $pdo->prepare($sqll);
        $querys->execute([$edit_name, $edit_city, $get_id]);
        header('Location: '. $_SERVER['HTTP_REFERER']);
        $success = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>Данные успешно обновлены!</strong> Вы можете закрыть это сообщение.
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>';
    } catch (Exception $e) {
        $success = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>Пустые начения не допустимы!</strong> Вы можете закрыть это сообщение.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>';
}
}

// DELETE Client
if (isset($_POST['delete_submit'])) {
	$sql = "DELETE FROM users WHERE id=?";
	$query = $pdo->prepare($sql);
	$query->execute([$get_id]);
	header('Location: '. $_SERVER['HTTP_REFERER']);
}
