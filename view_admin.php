<?php
session_start();

require_once 'connect.php';

$player = mysqli_query($connect, "SELECT hockey_player.id, hockey_player.surname, hockey_player.name, hockey_player.role, hockey_player.number, region_of_birth.name_region, hockey_club.name_h FROM `hockey_player`, `region_of_birth`, `contract`, `hockey_club`, `place_of_birth`, `city_of_birth` WHERE hockey_player.id_place_of_birth = place_of_birth.id AND place_of_birth.id_city = city_of_birth.id AND city_of_birth.id_region = region_of_birth.id AND hockey_player.id = contract.id_player AND hockey_club.id = contract.id_hockey_club");
$player = mysqli_fetch_all($player);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="\Project\style\mainS.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="\Project\bootstrap\js\bootstrap.min.js"></script>
    <title>Обзор</title>
</head>

<body>
    <div class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid navbar navbar-inverse">
            <a class="navbar-brand" href="\Project\admin_interface.php">BDHockey</a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a href="view_admin.php">Обзор игроков</a>
                    <a href="\Project\hc\view_club_admin.php">Обзор
                        клубов</a>
                    <a href="new_zapisy_adm.php">Новая запись</a>
                    <a href="\Project\adminu.html">Администратору</a>
                    <a href="\Project\info.html">Информация</a>
                    <a id="logg" href="logout.php">Выйти</a>
                </div>
            </div>
        </div>
        <form class="d-flex" action="search_admin.php" method="post">
            <input type="search" class="form-control me-2" name="search" class="span2 search-query" placeholder="Поиск"
                aria-label="Search">
            <button class="btn btn-primary" type="submit">Поиск</button>
        </form>
    </div>

    <div class="igroki">
        <?php
        foreach ($player as $item) {
            ?>
            <div>
                <a href="obzor_igroka.php?id=<?= $item[0] ?>"><?= $item[1] . " " . $item[2] ?></a>
                <?= $item[4] ?>
                <?= $item[3] ?>
                <?= $item[5] ?>
                <p>
                    <?= $item[6] ?>
                </p>
                <div id="delUP">
                    <a href="update\form_upd_igrok.php?id=<?= $item[0] ?>">Изменить</a>
                    <a href="delete\delete_zapis_igrok.php?id=<?= $item[0] ?>">Удалить</a>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

</body>

</html>