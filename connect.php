<?php

$connect = mysqli_connect('std-mysql', 'std_1789_hockey_player', '10092003', 'std_1789_hockey_player');
if (!$connect) {
    die('Ошибка подключения к БД');
}
?>