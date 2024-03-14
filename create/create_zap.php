<?php
require_once 'connect.php';

// ===========================================================Информация об игроке==================================================

$surname = $_POST['surname'];
$name = $_POST['name'];
$patronymic = $_POST['patronymic'];
$date_of_birth = $_POST['date_of_birth'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$role = $_POST['role'];
$number = $_POST['number'];
$sports_category = $_POST['sports_category'];
$id_region_of_birth = $_POST['name_region'];
$name_region = $_POST['name_region'];
$name_city = $_POST['name_city'];
$street = $_POST['street'];
$type_of_contract = $_POST['type_of_contract'];
$contract_amount = $_POST['contract_amount'];
$date_of_signing = $_POST['date_of_signing'];
$contract_duration = $_POST['contract_duration'];
$hockey_club_id = $_POST['name_h'];
$season_id = $_POST['season_years'];
$number_of_games = $_POST['number_of_games'];
$number_of_goals = $_POST['number_of_goals'];
$number_of_assists = $_POST['number_of_assists'];
$number_of_points = $_POST['number_of_points'];
$reward = $_POST['reward'];


if ((!empty($surname)) && (!empty($name)) && (!empty($patronymic)) && (!empty($date_of_birth)) && (!empty($height)) && (!empty($weight)) && (!empty($role)) && (!empty($number)) && (!empty($sports_category)) && (!empty($name_region)) && (!empty($name_city)) && (!empty($street)) && (!empty($type_of_contract)) && (!empty($contract_amount)) && (!empty($date_of_signing)) && (!empty($contract_duration)) && (!empty($number_of_games)) && (!empty($number_of_goals)) && (!empty($number_of_assists)) && (!empty($number_of_points)) && (!empty($reward))) {


	$q3 = "INSERT INTO `city_of_birth` (`id`, `name_city`, `id_region`) VALUES (NULL, '$name_city', '$id_region_of_birth')";
	$result3 = mysqli_query($connect, $q3);

	$q4 = "SET @id_city = LAST_INSERT_ID()";
	$result4 = mysqli_query($connect, $q4);

	$q5 = "INSERT INTO `place_of_birth` (`id`, `street`, `id_city`) VALUES (NULL, '$street', @id_city)";
	$result5 = mysqli_query($connect, $q5);

	$q6 = "SET @id_place_of_birth = LAST_INSERT_ID()";
	$result6 = mysqli_query($connect, $q6);

	$q7 = "INSERT INTO `hockey_player` (`id`, `surname`, `name`, `patronymic`, `date_of_birth`, `height`, `weight`, `role`, `number`, `sports_category`, `id_place_of_birth`) VALUES (NULL, '$surname', '$name', '$patronymic', '$date_of_birth', '$height', '$weight', '$role', '$number', '$sports_category', @id_place_of_birth)";
	$result7 = mysqli_query($connect, $q7);

	$q8 = "SET @id_player = LAST_INSERT_ID()";
	$result8 = mysqli_query($connect, $q8);

	$q10 = "INSERT INTO `contract` (`id`, `type_of_contract`, `contract_amount`, `date_of_signing`, `contract_duration`, `id_player`, `id_hockey_club`) VALUES (NULL, '$type_of_contract', '$contract_amount', '$date_of_signing', '$contract_duration', @id_player, '$hockey_club_id')";
	$result10 = mysqli_query($connect, $q10);

	$q12 = "INSERT INTO `player_statistics` (`id`, `number_of_games`, `number_of_goals`, `number_of_assists`, `number_of_points`, `id_hockey_player`, `id_season`) VALUES (NULL, '$number_of_games', '$number_of_goals', '$number_of_assists', '$number_of_points', @id_player, '$season_id')";
	$result12 = mysqli_query($connect, $q12);

	$q13 = "SET @id_player_statistics = LAST_INSERT_ID()";
	$result13 = mysqli_query($connect, $q13);

	$q14 = "INSERT INTO `player_reward` (`id`, `reward`, `id_player_statistics`) VALUES (NULL, '$reward', @id_player_statistics)";
	$result14 = mysqli_query($connect, $q14);

	if ($result13) {
		echo "Запись успешно создана<br>";
	} else {
		echo "Ошибка";
	}
} else {
	echo "Заполните все поля формы!!!<br>";
}
?>
<!DOCTYPE html>
<html lang="ru">

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
	<title>Главная</title>
</head>

<body>
	<a href="\Project\admin_interface.php">На главную</a>
</body>

</html>