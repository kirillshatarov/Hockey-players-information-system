<?php
session_start();

require_once 'connect.php';

$id_hockey_club = mysqli_query($connect, "SELECT `id`, `name_h` FROM `hockey_club`");
$id_season = mysqli_query($connect, "SELECT `id`, `season_years` FROM `season` ORDER BY `season_years` DESC");
$id_region_of_birth = mysqli_query($connect, "SELECT `id`, `name_region` FROM `region_of_birth` ORDER BY `name_region`");

// $id_place_of_birth = mysqli_query($connect, "SELECT `id`, `street` FROM `place_of_birth`");
// $id_region = mysqli_query($connect, "SELECT `id`, `name_region` FROM `region_of_birth`");
// $id_city = mysqli_query($connect, "SELECT `id`, `name_city` FROM `city_of_birth`");
// $id_player = mysqli_query($connect, "SELECT `id`, `surname` FROM `hockey_player`");
// $id_hockey_player = mysqli_query($connect, "SELECT `id`, `surname` FROM `hockey_player`");
// $id_season = mysqli_query($connect, "SELECT `id`, `season_years` FROM `season`");
// $id_player_statistics = mysqli_query($connect, "SELECT `id` FROM `player_statistics`");
// $id_hockey_club = mysqli_query($connect, "SELECT `id`, `name_h` FROM `hockey_club`");
// $id_country_hc = mysqli_query($connect, "SELECT `id`, `name_country_hc` FROM `country_hc`");
// $id_manager_hc = mysqli_query($connect, "SELECT `id`, `manager_surname` FROM `manager_hc`");
// $id_country = mysqli_query($connect, "SELECT `id`, `name_country_hc` FROM `country_hc`");
// $id_sponsor = mysqli_query($connect, "SELECT `id`, `sponsor_name` FROM `sponsor`");
// $id_hockey_club2 = mysqli_query($connect, "SELECT `id`, `name_h` FROM `hockey_club`");
// $id_hockey_club3 = mysqli_query($connect, "SELECT `id`, `name_h` FROM `hockey_club`");
// $id_coaching_staff = mysqli_query($connect, "SELECT `id`, `number_of_coaches` FROM `coaching_staff`");

// $id_hockey_club4 = mysqli_query($connect, "SELECT `id`, `name_h` FROM `hockey_club`");
// $id_statistics_hc = mysqli_query($connect, "SELECT `id` FROM `statistics_hc`");
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
    <title>Добавление новой записи</title>
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

        <div class="new_z">
            <!-- =========================================================Информация об игроке============================== -->
            <form action="create\create_zap.php" method="post">
                <h2>Информация об игроке</h2>
                <label>Фамилия</label>
                <input type="text" name="surname">
                <label>Имя</label>
                <input type="text" name="name">
                <label>Отчество</label>
                <input type="text" name="patronymic">
                <label>Дата рождения</label>
                <input type="date" name="date_of_birth">
                <label>Рост</label>
                <input type="text" name="height">
                <label>Вес</label>
                <input type="text" name="weight">
                <label>Название ХК</label>
                <select name="name_h" required="required">
                    <option value="">Выберите клуб</option>
                    <?php
                    while ($object1 = mysqli_fetch_object($id_hockey_club)) { ?>
                        <option value="<?= $object1->id ?>"><?php echo $object1->name_h ?></option>;
                        <?php
                    }
                    ?>
                </select>
                <label>Амплуа</label>
                <select name="role" required="required">
                    <option value="">Выберите значение</option>
                    <option value="Нападающий">Нападающий</option>
                    <option value="Защитник">Защитник</option>
                    <option value="Вратарь">Вратарь</option>
                </select>
                <!-- <input type="text" name="role"> -->
                <label>Игровой номер</label>
                <input type="text" name="number">
                <label>Спортивное звание</label>
                <select name="sports_category" required="required">
                    <option value="">Выберите значение</option>
                    <option value="КМС">КМС</option>
                    <option value="МС">МС</option>
                    <option value="ЗМС">ЗМС</option>
                    <option value="ОЧ">ОЧ</option>
                </select>
                <!-- <input type="text" name="sports_category"> -->

                <h2>Место рождения игрока</h2>
                <label>Страна</label>
                <select name="name_region" required="required">
                    <option value="">Выберите страну</option>
                    <?php
                    while ($object3 = mysqli_fetch_object($id_region_of_birth)) { ?>
                        <option value="<?= $object3->id ?>"><?php echo $object3->name_region ?></option>;
                        <?php
                    }
                    ?>
                </select>
                <!-- <input type="text" name="name_region"> -->
                <label>Город</label>
                <input type="text" name="name_city">
                <label>Улица</label>
                <input type="text" name="street">

                <h2>Контракт</h2>
                <label>Тип</label>
                <select name="type_of_contract" required="required">
                    <option value="">Выберите значение</option>
                    <option value="«Основная команда» (односторонний)">«Основная команда» (односторонний)</option>
                    <option value="«Основная команда + вторая» (двусторонний)">«Основная команда + вторая»
                        (двусторонний)</option>
                    <option value="«Основная команда + вторая, молодежная команды» (трёхсторонний)">«Основная команда +
                        вторая, молодежная команды» (трёхсторонний)</option>
                    <option value="«Пробный контракт»">«Пробный контракт»</option>
                    <option value="МХЛ «Молодёжные команды» (двусторонний)">МХЛ «Молодёжные команды» (двусторонний)
                    </option>
                </select>
                <!-- <input type="text" name="type_of_contract"> -->
                <label>Сумма</label>
                <input type="text" name="contract_amount">
                <label>Дата заключения</label>
                <input type="date" name="date_of_signing">
                <label>Продолжительность</label>
                <input type="text" name="contract_duration">

                <h2>Статистика</h2>
                <label>Cезон</label>
                <select name="season_years" required="required">
                    <option value="">Выберите сезон</option>
                    <?php
                    while ($object2 = mysqli_fetch_object($id_season)) { ?>
                        <option value="<?= $object2->id ?>"><?php echo $object2->season_years ?></option>;
                        <?php
                    }
                    ?>
                </select>
                <label>Количество игр</label>
                <input type="text" name="number_of_games">
                <label>Количество голов (отражённых бросков)</label>
                <input type="text" name="number_of_goals">
                <label>Количество передач</label>
                <input type="text" name="number_of_assists">
                <label>Количество очков</label>
                <input type="text" name="number_of_points">

                <h2>Награды</h2>
                <textarea name="reward" cols="30" rows="4" placeholder="Введите все достижения игрока"></textarea>

                <p><button class="bttn_search" type="submit">Добавить</button></p>
            </form>
        </div>
    </div>
</body>

</html>