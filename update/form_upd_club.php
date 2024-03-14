<?php
session_start();

require_once 'connect.php';

$club_id = $_GET['id'];

$club_upd = mysqli_query($connect, "SELECT DISTINCT `hockey_club`.`id`, `name_h`, `league`, `home_arena`, `division`, `conference`, `year_of_creation`, `name_country_hc`, `city_hc`, `manager_surname`, `manager_name`, `manager_patronymic`, `coach_surname`, `coach_name`, `coach_patronymic`, `coaching_position`, `number_of_coaches`, `sponsor_name`, `sponsor_contract_amount`, `date_of_conclusion`, `duration`, `season_years`, `number_of_games_played`, `number_of_wins`, `number_of_points_hc`, `place_in_the_league`, `award` FROM `hockey_club`, `country_hc`, `manager_hc`, `coach`, `coaching_staff`, `sponsor`,  `sponsorship_contracts`, `season`, `statistics_hc`, `award_hc` WHERE hockey_club.id_country_hc = country_hc.id AND manager_hc.id = hockey_club.id_manager_hc AND coaching_staff.id_hockey_club = hockey_club.id AND coaching_staff.id = coach.id_coaching_staff AND hockey_club.id = sponsorship_contracts.id_hockey_club AND sponsor.id = sponsorship_contracts.id_sponsor AND season.id = statistics_hc.id_season AND hockey_club.id = statistics_hc.id_hockey_club AND statistics_hc.id = award_hc.id_statistics_hc AND `hockey_club`.`id` = '$club_id'");
$club_upd = mysqli_fetch_assoc($club_upd);

$name_country_hc = $club_upd['name_country_hc'];
$id_country = mysqli_query($connect, "SELECT `id` FROM `country_hc` WHERE `name_country_hc` = '$name_country_hc' ");
$id_country = $id_country->fetch_assoc()['id'];
$country = mysqli_query($connect, "SELECT DISTINCT `id`, `name_country_hc` FROM `country_hc`  WHERE `name_country_hc` NOT IN ('$name_country_hc') ORDER BY `name_country_hc`");

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
            <form action="upd_zapis_club.php" method="post">
                <h2>Изменить запись</h2>
                <input type="hidden" name="id_club" value="<?= $club_id ?>">
                <label>Название ХК</label>
                <input type="text" name="name_h" value="<?= $club_upd['name_h'] ?>">
                <label>Лига</label>
                <input type="text" name="league" value="<?= $club_upd['league'] ?>" disabled>
                <select name="league">
                    <option value="<?= $club_upd['league'] ?>">Выберите новое значение</option>
                    <option value="КХЛ">КХЛ</option>
                    <option value="НХЛ">НХЛ</option>
                </select>

                <label>Домашняя арена</label>
                <input type="text" name="home_arena" value="<?= $club_upd['home_arena'] ?>">
                <label>Дивизион</label>
                <input type="text" name="division" value="<?= $club_upd['division'] ?>" disabled>
                <select name="division">
                    <option value="<?= $club_upd['division'] ?>">Выберите новое значение</option>
                    <option value="Харламова">Харламова</option>
                    <option value="Боброва">Боброва</option>
                    <option value="Тарасова">Тарасова</option>
                    <option value="Чернышёва">Чернышёва</option>
                </select>

                <label>Конференция</label>
                <input type="text" name="conference" value="<?= $club_upd['conference'] ?>" disabled>
                <select name="conference">
                    <option value="<?= $club_upd['conference'] ?>">Выберите новое значение</option>
                    <option value="Запад">Запад</option>
                    <option value="Восток">Восток</option>
                </select>

                <label>Год создания</label>
                <input type="date" name="year_of_creation" value="<?= $club_upd['year_of_creation'] ?>">
                <label>Страна</label>
                <select name="name_country_hc">
                    <option value="<?= $id_country ?>">
                        <?= $club_upd['name_country_hc'] ?>
                    </option>
                    <?php
                    while ($object = mysqli_fetch_object($country)) { ?>
                        <option value="<?= $object->id ?>"><?php echo $object->name_country_hc ?></option>;
                        <?php
                    }
                    ?>
                </select>
                <label>Город</label>
                <input type="text" name="city_hc" value="<?= $club_upd['city_hc'] ?>">
                <label>Фамилия менеджера</label>
                <input type="text" name="manager_surname" value="<?= $club_upd['manager_surname'] ?>">
                <label>Имя менеджера</label>
                <input type="text" name="manager_name" value="<?= $club_upd['manager_name'] ?>">
                <label>Отчество менеджера</label>
                <input type="text" name="manager_patronymic" value="<?= $club_upd['manager_patronymic'] ?>">
                <label>Фамилия тренера</label>
                <input type="text" name="coach_surname" value="<?= $club_upd['coach_surname'] ?>">
                <label>Имя тренера</label>
                <input type="text" name="coach_name" value="<?= $club_upd['coach_name'] ?>">
                <label>Отчество тренера</label>
                <input type="text" name="coach_patronymic" value="<?= $club_upd['coach_patronymic'] ?>">
                <label>Статус тренера</label>
                <input type="text" name="coaching_position" value="<?= $club_upd['coaching_position'] ?>">
                <label>Кол-во тренеров</label>
                <input type="number" name="number_of_coaches" value="<?= $club_upd['number_of_coaches'] ?>">
                <label>Имя спонсора</label>
                <input type="text" name="sponsor_name" value="<?= $club_upd['sponsor_name'] ?>">
                <label>Сумма спонсорского контракта</label>
                <input type="text" name="sponsor_contract_amount" value="<?= $club_upd['sponsor_contract_amount'] ?>">
                <label>Дата заключения контракта</label>
                <input type="date" name="date_of_conclusion" value="<?= $club_upd['date_of_conclusion'] ?>">
                <label>Продолжительность контракта</label>
                <input type="text" name="duration" value="<?= $club_upd['duration'] ?>">
                <label>Сезон</label>
                <input type="text" name="season_years" value="<?= $club_upd['season_years'] ?>">
                <label>Кол-во сыгранных игр</label>
                <input type="number" name="number_of_games_played" value="<?= $club_upd['number_of_games_played'] ?>">
                <label>Кол-во побед</label>
                <input type="number" name="number_of_wins" value="<?= $club_upd['number_of_wins'] ?>">
                <label>Кол-во очков</label>
                <input type="number" name="number_of_points_hc" value="<?= $club_upd['number_of_points_hc'] ?>">
                <label>Место в лиге</label>
                <input type="number" name="place_in_the_league" value="<?= $club_upd['place_in_the_league'] ?>">
                <label>Награда</label>
                <textarea name="award" cols="30" rows="4"><?= $club_upd['award'] ?></textarea>
                <p><button class="bttn_search" type="submit">ОК</button></p>

            </form>
        </div>
    </div>
</body>

</html>