<?php
// session_start();

require_once 'connect.php';

$id_club = $_POST['id_club'];
$name_h = $_POST['name_h'];
$league = $_POST['league'];
$home_arena = $_POST['home_arena'];
$division = $_POST['division'];
$conference = $_POST['conference'];
$year_of_creation = $_POST['year_of_creation'];
$id_country_hc = $_POST['name_country_hc'];
$city_hc = $_POST['city_hc'];
$manager_surname = $_POST['manager_surname'];
$manager_name = $_POST['manager_name'];
$manager_patronymic = $_POST['manager_patronymic'];
$coach_surname = $_POST['coach_surname'];
$coach_name = $_POST['coach_name'];
$coach_patronymic = $_POST['coach_patronymic'];
$coaching_position = $_POST['coaching_position'];
$number_of_coaches = $_POST['number_of_coaches'];
$sponsor_name = $_POST['sponsor_name'];
$sponsor_contract_amount = $_POST['sponsor_contract_amount'];
$date_of_conclusion = $_POST['date_of_conclusion'];
$duration = $_POST['duration'];
$season_years = $_POST['season_years'];
$number_of_games_played = $_POST['number_of_games_played'];
$number_of_wins = $_POST['number_of_wins'];
$number_of_points_hc = $_POST['number_of_points_hc'];
$place_in_the_league = $_POST['place_in_the_league'];
$award = $_POST['award'];

mysqli_query($connect, "UPDATE `hockey_club`, `country_hc`, `manager_hc`, `coach`, `coaching_staff`, `sponsor`, `sponsorship_contracts`, `season`, `statistics_hc`, `award_hc` SET `name_h` = '$name_h', `league` = '$league', `home_arena` = '$home_arena', `division` = '$division', `conference` = '$conference', `year_of_creation` = '$year_of_creation', `hockey_club`.`id_country_hc` = '$id_country_hc', `city_hc` = '$city_hc', `manager_surname` = '$manager_surname', `manager_name` = '$manager_name', `manager_patronymic` = '$manager_patronymic', `coach_surname` = '$coach_surname', `coach_name` = '$coach_name', `coach_patronymic` = '$coach_patronymic', `coaching_position` = '$coaching_position', `number_of_coaches` = '$number_of_coaches', `sponsor_name` = '$sponsor_name', `sponsor_contract_amount` = '$sponsor_contract_amount', `date_of_conclusion` = '$date_of_conclusion', `duration` = '$duration', `season_years` = '$season_years', `number_of_games_played` = '$number_of_games_played', `number_of_wins` = '$number_of_wins', `number_of_points_hc` = '$number_of_points_hc', `place_in_the_league` = '$place_in_the_league', `award` = '$award' WHERE hockey_club.id_country_hc = country_hc.id AND manager_hc.id = hockey_club.id_manager_hc AND coaching_staff.id_hockey_club = hockey_club.id AND coaching_staff.id = coach.id_coaching_staff AND hockey_club.id = sponsorship_contracts.id_hockey_club AND sponsor.id = sponsorship_contracts.id_sponsor AND season.id = statistics_hc.id_season AND hockey_club.id = statistics_hc.id_hockey_club AND statistics_hc.id = award_hc.id_statistics_hc AND `hockey_club`.`id` = '$id_club' ");

header('Location: ../hc/view_club_admin.php');

?>