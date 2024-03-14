<?php
session_start();

require_once 'connect.php';

$club_id = $_POST['club_id'];
$season_id = $_POST['season_years'];

$statistika = mysqli_query($connect, "SELECT DISTINCT `number_of_games_played`, `number_of_wins`, `number_of_points_hc`, `place_in_the_league` FROM `season`, `hockey_club`, `statistics_hc` WHERE hockey_club.id = statistics_hc.id_hockey_club AND statistics_hc.id_season = '$season_id' AND hockey_club.id = '$club_id' ");
$statistika = mysqli_fetch_all($statistika);

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
	<title>Статистика по сезону</title>
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
		foreach ($statistika as $itemS) {
			?>
			<div class="obzor">
				<div>
					<h4>Кол-во сыгранных игр</h4>
					<?= $itemS[0] ?>
				</div>
				<div>
					<h4>Кол-во побед</h4>
					<?= $itemS[1] ?>
				</div>
				<div>
					<h4>Кол-во очков</h4>
					<?= $itemS[2] ?>
				</div>
				<div>
					<h4>Место в лиге</h4>
					<?= $itemS[3] ?>
				</div>
			</div>
			<?php
		}
		?>
		<div><a href="/Project/obzor_cluba.php?id=<?= $club_id ?>">Назад</a></div>

	</div>


</body>

</html>