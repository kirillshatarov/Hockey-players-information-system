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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style\mainS.css">
    <title>Обзор</title>
</head>

<body>
    <div class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid navbar navbar-inverse">
            <a class="navbar-brand" href="\Project\user_interface.php">BDHockey</a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a href="view_user.php">Обзор игроков</a>
                    <a href="\Project\hc\view_club_user.php">Обзор клубов</a>
                    <a href="\Project\infou.html">Информация</a>
                    <a id="logg" href="logout.php">Выйти</a>
                </div>
            </div>
        </div>
        <form class="d-flex" action="search_user.php" method="post">
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
                <a href="obzor_igroka_user.php?id=<?= $item[0] ?>"><?= $item[1] . " " . $item[2] ?></a>
                <?= $item[4] ?>
                <?= $item[3] ?>
                <?= $item[5] ?>
                <p>
                    <?= $item[6] ?>
                </p>
            </div>
            <?php
        }
        ?>
    </div>

</body>

</html>