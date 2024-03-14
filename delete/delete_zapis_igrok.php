<?php
require_once 'connect.php';
$id = $_GET['id'];

$delete_result = mysqli_query($connect, "DELETE FROM `hockey_player` WHERE `id` = '$id' ");

if ($delete_result) {
    echo "Запись удалёна<br>";
} else {
    echo "Ошибка: " . mysqli_error($connect) . "<br>";
}

header('Location: ../view_admin.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обзор и изменение игрока</title>
</head>

<body>
    <a href="\Project\admin_interface.php">На главную</a>
</body>

</html>