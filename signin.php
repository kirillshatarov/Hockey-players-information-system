<?php

session_start();
// if(!empty($_SESSION['user'])) {
//     header('Location: hockey_players.php');
// }
// if(!empty($_SESSION['admin'])) {
//     header('Location: admin_interface.php');
// }

require_once 'connect.php';

$login = $_POST['login'];
$password = md5($_POST['password']);
$login_admin = $_POST['login'];
$password_admin = $_POST['password'];

$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
$check_admin = mysqli_query($connect, "SELECT * FROM `lvl_user` WHERE `login` = '$login_admin' AND `password` = '$password_admin'");


if (mysqli_num_rows($check_user) > 0) {

    // $user = mysqli_fetch_assoc($check_user);

    // $_SESSION['user'] = [
    //     "id" => $user['id'],
    //     "full_name" => $user['full_name'],
    //     "email" => $user['email']
    // ];

    //if(mysqli_num_rows($check_admin) > 0) {

    // $admin = mysqli_fetch_assoc($check_admin);

    // $_SESSION['user'] = [
    //     "id" => $admin['id'],
    //     "login" => $admin['login']
    // ];
    //header('Location: admin_interface.php');

    //}


    header('Location: user_interface.php');
} elseif (mysqli_num_rows($check_admin) > 0) {
    header('Location: admin_interface.php');
} else {
    $_SESSION['message'] = 'Неверный логин или пароль';
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>