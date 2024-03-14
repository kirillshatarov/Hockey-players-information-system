<?php
session_start();

require_once 'connect.php';

$igrok_id = $_GET['id'];

$igrok_upd = mysqli_query($connect, "SELECT DISTINCT `hockey_player`.`id`, `surname`, `name`, `patronymic`, `date_of_birth`, `height`, `weight`, `role`, `number`, `sports_category`, `name_region`, `name_city`, `street`, `type_of_contract`, `contract_amount`, `date_of_signing`, `contract_duration`, `season_years`, `number_of_games`, `number_of_goals`, `number_of_assists`, `number_of_points`, `reward`, `name_h` FROM `hockey_player`, `region_of_birth`, `city_of_birth`, `place_of_birth`, `contract`, `season`, `player_statistics`, `player_reward`, `hockey_club` WHERE hockey_player.id_place_of_birth = place_of_birth.id AND place_of_birth.id_city = city_of_birth.id AND city_of_birth.id_region = region_of_birth.id AND contract.id_player = hockey_player.id AND hockey_player.id = player_statistics.id_hockey_player AND player_statistics.id_season = season.id AND player_statistics.id = player_reward.id_player_statistics AND `hockey_player`.`id` = '$igrok_id' AND contract.id_player AND hockey_club.id = contract.id_hockey_club");
$igrok_upd = mysqli_fetch_assoc($igrok_upd);

$name_h = $igrok_upd['name_h'];
$id_hc = mysqli_query($connect, "SELECT `id` FROM `hockey_club` WHERE `name_h` = '$name_h' ");
$id_hc = $id_hc->fetch_assoc()['id'];
$hc = mysqli_query($connect, "SELECT DISTINCT `hockey_club`.`id`, `name_h` FROM `hockey_club`, `hockey_player`, `contract` WHERE `name_h` NOT IN ('$name_h') ");


$name_region = $igrok_upd['name_region'];
$id_rb = mysqli_query($connect, "SELECT `id` FROM `region_of_birth` WHERE `name_region` = '$name_region' ");
$id_rb = $id_rb->fetch_assoc()['id'];
$rb = mysqli_query($connect, "SELECT DISTINCT `id`, `name_region` FROM `region_of_birth`  WHERE `name_region` NOT IN ('$name_region') ORDER BY `name_region`");

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
    <link rel="stylesheet" href="\Project\style\mainS.css">
    <title>Изменить запись</title>
</head>

<body>
    <div class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid navbar navbar-inverse">
            <a class="navbar-brand" href="\Project\admin_interface.php">BDHockey</a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a href="\Project\view_admin.php">Обзор игроков</a>
                    <a href="\Project\hc\view_club_admin.php">Обзор
                        клубов</a>
                    <a href="\Project\new_zapisy_adm_copy.php">Новая запись</a>
                    <a href="\Project\adminu.html">Администратору</a>
                    <a href="\Project\info.html">Информация</a>
                    <a id="logg" href="\Project\logout.php">Выйти</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="new_z">
            <form action="upd_zapis_igrok.php" method="post">
                <h2>Изменить запись</h2>
                <input type="hidden" name="igrok_id" value="<?= $igrok_id ?>">

                <label>Фамилия</label>
                <input type="text" name="surname" value="<?= $igrok_upd['surname'] ?>">
                <label>Имя</label>
                <input type="text" name="name" value="<?= $igrok_upd['name'] ?>">
                <label>Отчество</label>
                <input type="text" name="patronymic" value="<?= $igrok_upd['patronymic'] ?>">
                <label>Дата рождения</label>
                <input type="date" name="date_of_birth" value="<?= $igrok_upd['date_of_birth'] ?>">
                <label>Рост</label>
                <input type="number" name="height" value="<?= $igrok_upd['height'] ?>">
                <label>Вес</label>
                <input type="number" name="weight" value="<?= $igrok_upd['weight'] ?>">
                <label>Клуб</label>
                <select name="name_h">
                    <option value="<?= $id_hc ?>">
                        <?= $igrok_upd['name_h'] ?>
                    </option>
                    <?php
                    while ($object1 = mysqli_fetch_array($hc)) { ?>
                        <option value="<?= $object1['id'] ?>"><?php echo $object1['name_h'] ?></option>;
                        <?php
                    }
                    ?>
                </select>
                <label>Амплуа</label>
                <input type="text" name="role" value="<?= $igrok_upd['role'] ?>" disabled>
                <select name="role">
                    <option value="<?= $igrok_upd['role'] ?>">Выберите новое значение</option>
                    <option value="Нападающий">Нападающий</option>
                    <option value="Защитник">Защитник</option>
                    <option value="Вратарь">Вратарь</option>
                </select>
                <label>Игровой номер</label>
                <input type="number" name="number" value="<?= $igrok_upd['number'] ?>">
                <label>Спортивное звание</label>
                <input type="text" name="sports_category" value="<?= $igrok_upd['sports_category'] ?>" disabled>
                <select name="sports_category">
                    <option value="<?= $igrok_upd['sports_category'] ?>">Выберите новое значение</option>
                    <option value="КМС">КМС</option>
                    <option value="МС">МС</option>
                    <option value="ЗМС">ЗМС</option>
                    <option value="ОЧ">ОЧ</option>
                </select>
                <label>Страна</label>
                <select name="name_region">
                    <option value="<?= $id_rb ?>">
                        <?= $igrok_upd['name_region'] ?>
                    </option>
                    <?php
                    while ($object3 = mysqli_fetch_object($rb)) { ?>
                        <option value="<?= $object3->id ?>"><?php echo $object3->name_region ?></option>;
                        <?php
                    }
                    ?>
                </select>
                <label>Город</label>
                <input type="text" name="name_city" value="<?= $igrok_upd['name_city'] ?>">
                <label>Улица</label>
                <input type="text" name="street" value="<?= $igrok_upd['street'] ?>">
                <label>Тип контракта</label>
                <input type="text" name="type_of_contract" value="<?= $igrok_upd['type_of_contract'] ?>" disabled>
                <select name="type_of_contract">
                    <option value="<?= $igrok_upd['type_of_contract'] ?>">Выберите новое значение</option>
                    <option value="«Основная команда» (односторонний)">«Основная команда» (односторонний)</option>
                    <option value="«Основная команда + вторая» (двусторонний)">«Основная команда + вторая»
                        (двусторонний)</option>
                    <option value="«Основная команда + вторая, молодежная команды» (трёхсторонний)">«Основная команда +
                        вторая, молодежная команды» (трёхсторонний)</option>
                    <option value="«Пробный контракт»">«Пробный контракт»</option>
                    <option value="МХЛ «Молодёжные команды» (двусторонний)">МХЛ «Молодёжные команды» (двусторонний)
                    </option>
                </select>

                <label>Сумма контракта</label>
                <input type="text" name="contract_amount" value="<?= $igrok_upd['contract_amount'] ?>">
                <label>Дата подписания контракта</label>
                <input type="date" name="date_of_signing" value="<?= $igrok_upd['date_of_signing'] ?>">
                <label>Продолжительность контракта</label>
                <input type="text" name="contract_duration" value="<?= $igrok_upd['contract_duration'] ?>">
                <label>Сезон</label>
                <input type="text" name="season_years" value="<?= $igrok_upd['season_years'] ?>">
                <label>Кол-во сыгранных игр</label>
                <input type="number" name="number_of_games" value="<?= $igrok_upd['number_of_games'] ?>">
                <label>Кол-во заброшенных шайб</label>
                <input type="number" name="number_of_goals" value="<?= $igrok_upd['number_of_goals'] ?>">
                <label>Кол-во асистов</label>
                <input type="number" name="number_of_assists" value="<?= $igrok_upd['number_of_assists'] ?>">
                <label>Кол-во очков</label>
                <input type="number" name="number_of_points" value="<?= $igrok_upd['number_of_points'] ?>">
                <label>Награда</label>
                <textarea name="reward" cols="30" rows="4"><?= $igrok_upd['reward'] ?></textarea>
                <p><button class="bttn_search" type="submit">ОК</button></p>

            </form>
        </div>
    </div>
</body>

</html>