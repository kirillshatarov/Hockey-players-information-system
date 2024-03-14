<?php
require_once 'connect.php';
$id = $_GET['id'];

$delete_result = mysqli_query($connect, "DELETE FROM `hockey_club` WHERE `id` = '$id' ");

if ($delete_result) {
    echo "Запись удалёна<br>";
} else {
    echo "Ошибка: " . mysqli_error($connect) . "<br>";
}

header('Location: ../hc/view_club_admin.php');

?>