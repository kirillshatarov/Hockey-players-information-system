<?php
// session_start();

require_once 'connect.php';

$igrok_id = $_POST['igrok_id'];
$surname = $_POST['surname'];
$name = $_POST['name'];
$patronymic = $_POST['patronymic'];
$date_of_birth = $_POST['date_of_birth'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$id_cluba = $_POST['name_h'];
$role = $_POST['role'];
$number = $_POST['number'];
$sports_category = $_POST['sports_category'];
$id_region_of_birth = $_POST['name_region'];
$name_city = $_POST['name_city'];
$street = $_POST['street'];
$type_of_contract = $_POST['type_of_contract'];
$contract_amount = $_POST['contract_amount'];
$date_of_signing = $_POST['date_of_signing'];
$contract_duration = $_POST['contract_duration'];
$season_years = $_POST['season_years'];
$number_of_games = $_POST['number_of_games'];
$number_of_goals = $_POST['number_of_goals'];
$number_of_assists = $_POST['number_of_assists'];
$number_of_points = $_POST['number_of_points'];
$reward = $_POST['reward'];


mysqli_query($connect, "UPDATE `hockey_player`, `region_of_birth`, `city_of_birth`, `place_of_birth`, `hockey_club`, `contract`, `season`, `player_statistics`, `player_reward` SET `surname` = '$surname', `name` = '$name', `patronymic` = '$patronymic', `date_of_birth` = '$date_of_birth', `height` = '$height', `weight` = '$weight', `role` = '$role', `contract`.`id_hockey_club` = '$id_cluba', `number` = '$number', `sports_category` = '$sports_category', `city_of_birth`.`id_region` = '$id_region_of_birth', `name_city` = '$name_city', `street` = '$street', `type_of_contract` = '$type_of_contract', `contract_amount` = '$contract_amount', `date_of_signing` = '$date_of_signing', `contract_duration` = '$contract_duration', `season_years` = '$season_years', `number_of_games` = '$number_of_games', `number_of_goals` = '$number_of_goals', `number_of_assists` = '$number_of_assists', `number_of_points` = '$number_of_points', `reward` = '$reward'  WHERE hockey_player.id_place_of_birth = place_of_birth.id AND place_of_birth.id_city = city_of_birth.id AND city_of_birth.id_region = region_of_birth.id AND contract.id_player = hockey_player.id AND hockey_player.id = player_statistics.id_hockey_player AND player_statistics.id_season = season.id AND player_statistics.id = player_reward.id_player_statistics AND `hockey_player`.`id` = '$igrok_id' AND contract.id_player AND hockey_club.id = contract.id_hockey_club ");

header('Location: ../view_admin.php');

?>