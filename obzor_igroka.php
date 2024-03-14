<?php
session_start();

require_once 'connect.php';

$igrok_id = $_GET['id'];

$season = mysqli_query($connect, "SELECT DISTINCT `season`.`id`, `season_years` FROM `season`, `hockey_player`, `player_statistics` WHERE hockey_player.id = player_statistics.id_hockey_player AND player_statistics.id_season = season.id AND hockey_player.id = '$igrok_id' ORDER BY `season_years` DESC");

$igrok = mysqli_query($connect, "SELECT DISTINCT `surname`, `name`, `patronymic`, `date_of_birth`, `height`, `weight`, `role`, `number`, `sports_category`, `name_region`, `name_city`, `street`, `type_of_contract`, `contraCt_amount`, `date_of_signing`, `contract_duration`, `season_years`, `number_of_games`, `number_of_goals`, `number_of_assists`, `number_of_points`, `reward`, `name_h` FROM `hockey_player`, `region_of_birth`, `city_of_birth`, `place_of_birth`, `contract`, `season`, `player_statistics`, `player_reward`, `hockey_club` WHERE hockey_player.id_place_of_birth = place_of_birth.id AND place_of_birth.id_city = city_of_birth.id AND city_of_birth.id_region = region_of_birth.id AND contract.id_player = hockey_player.id AND hockey_player.id = player_statistics.id_hockey_player AND player_statistics.id_season = season.id AND player_statistics.id = player_reward.id_player_statistics AND hockey_player.id = '$igrok_id' AND contract.id_player AND hockey_club.id = contract.id_hockey_club");
$igrok = mysqli_fetch_all($igrok);

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
    <title>Обзор игрока</title>
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
    </div>

    <div class="container-fluid">
        <?php
        foreach ($igrok as $itemi) {
            ?>
            <div class="obzor">
                <div>
                    <ul>
                        <li id="num">
                            <?= $itemi[7] ?>
                        </li>
                        <li id="FIO">
                            <?= $itemi[0] ?>
                            <?= $itemi[1] ?>
                            <?= $itemi[2] ?>
                        </li>
                        <p>
                            <li>Амплуа:
                                <?= $itemi[6] ?>
                            </li>
                            <li>Клуб:
                                <?= $itemi[22] ?>
                            </li>
                        </p>
                    </ul>
                </div>

                <div>
                    <h2>Данные</h2>
                    <ul>
                        <li>Место рождения<br>
                            <?= $itemi[9] ?>,
                            г.
                            <?= $itemi[10] ?>,
                            ул.
                            <?= $itemi[11] ?>
                        </li>
                        <li>Дата рождения<br>
                            <?= $itemi[3] ?>
                        </li>
                        <li>Рост<br>
                            <?= $itemi[4] ?> см
                        </li>
                        <li>Вес<br>
                            <?= $itemi[5] ?> кг
                        </li>
                        <li>Спортивное звание<br>
                            <?= $itemi[8] ?>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2>Контракт</h2>
                    <ul>
                        <li>Тип контракта<br>
                            <?= $itemi[12] ?>
                        </li>
                        <li>Сумма контракта<br>
                            <?= $itemi[13] ?> руб.
                        </li>
                        <li>Дата подписания контракта<br>
                            <?= $itemi[14] ?>
                        </li>
                        <li>Срок действия контракта<br>
                            <?= $itemi[15] ?>
                        </li>
                    </ul>
                    </p>
                </div>
                <div>
                    <h2>Сезон</h2>
                    <ul>
                        <li>
                            <form action="season_info.php" method="post">
                                <select name="season_years">
                                    <option value="">Выберите сезон</option>
                                    <?php
                                    while ($row = mysqli_fetch_array($season)) { ?>
                                        <option value="<?= $row['id'] ?>"><?php echo $row['season_years'] ?></option>;
                                        <?php
                                    }
                                    ?>
                                </select>
                                <input type="hidden" name="igrok_id" value="<?= $igrok_id ?>">
                                <p><button class="bttn_search" type="submit">Показать статистику по сезону</button></p>
                            </form>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2>Награды</h2>
                    <p>
                        <?= $itemi[21] ?>
                    </p>
                </div>
            </div>

        </div>
        <?php
        }
        ?>
    </div>

</body>

</html>