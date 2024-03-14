<?php
session_start();

require_once 'connect.php';

$club_id = $_GET['id'];

$season = mysqli_query($connect, "SELECT DISTINCT `season`.`id`, `season_years` FROM `season`, `hockey_club`, `statistics_hc` WHERE hockey_club.id = statistics_hc.id_hockey_club AND statistics_hc.id_season = season.id AND hockey_club.id = '$club_id' ORDER BY `season_years` DESC");

$club = mysqli_query($connect, "SELECT DISTINCT `name_h`, `league`, `home_arena`, `division`, `conference`, `year_of_creation`, `name_country_hc`, `city_hc`, `manager_surname`, `manager_name`, `manager_patronymic`, `coach_surname`, `coach_name`, `coach_patronymic`, `coaching_position`, `number_of_coaches`, `sponsor_name`, `sponsor_contract_amount`, `date_of_conclusion`, `duration`, `season_years`, `number_of_games_played`, `number_of_wins`, `number_of_points_hc`, `place_in_the_league`, `award` FROM `hockey_club`, `country_hc`, `manager_hc`, `coach`, `coaching_staff`, `sponsor`,  `sponsorship_contracts`, `season`, `statistics_hc`, `award_hc` WHERE hockey_club.id_country_hc = country_hc.id AND manager_hc.id = hockey_club.id_manager_hc AND coaching_staff.id_hockey_club = hockey_club.id AND coaching_staff.id = coach.id_coaching_staff AND hockey_club.id = sponsorship_contracts.id_hockey_club AND sponsor.id = sponsorship_contracts.id_sponsor AND season.id = statistics_hc.id_season AND hockey_club.id = statistics_hc.id_hockey_club AND statistics_hc.id = award_hc.id_statistics_hc AND hockey_club.id = '$club_id'");
$club = mysqli_fetch_all($club);

$roster_hc = mysqli_query($connect, "SELECT DISTINCT  hockey_player.id, `hockey_player`.`surname`, `hockey_player`.`name`, `hockey_player`.`patronymic`, `hockey_player`.`role`, `hockey_player`.`number`, `region_of_birth`.`name_region` FROM `hockey_player`, `region_of_birth`, `contract`, `hockey_club`, `place_of_birth`, `city_of_birth` WHERE hockey_player.id_place_of_birth = place_of_birth.id AND place_of_birth.id_city = city_of_birth.id AND city_of_birth.id_region = region_of_birth.id AND hockey_player.id = contract.id_player AND hockey_club.id = contract.id_hockey_club AND `hockey_club`.`id` = '$club_id'");
$roster_hc = mysqli_fetch_all($roster_hc);

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
	<title>Обзор клуба</title>
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
					<a id="logg" href="\Project\logout.php">Выйти</a>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<?php
		foreach ($club as $itemic) {
			?>
			<div class="obzor">
				<div>
					<ul>
						<p>
							<li id="FIO">
								<?= $itemic[0] ?>
							</li>
							<li>
								<?= $itemic[6] ?>,
								<?= $itemic[7] ?>
							</li>
						</p>
						<li>Домашняя арена<br>
							<?= $itemic[2] ?>
						</li>
						<li>Год основания клуба<br>
							<?= $itemic[5] ?>
						</li>
					</ul>
				</div>
				<div>
					<ul>
						<li>Лига<br>
							<?= $itemic[1] ?>
						</li>
						<li>Конференция<br>
							<?= $itemic[4] ?>
						</li>
						<li>Дивизион<br>
							<?= $itemic[3] ?>
						</li>
					</ul>
				</div>
				<div>
					<h2>Тренерский штаб</h2>
					<ul>
						<li> Главный тренер<br>
							<?= $itemic[11] ?>
							<?= $itemic[12] ?>
							<?= $itemic[13] ?>
						</li>
						<li>Кол-во тренеров<br>
							<?= $itemic[15] ?>
						</li>
					</ul>
				</div>
				<div>
					<h2>Менеджер</h2>
					<ul>
						<li>
							<?= $itemic[8] ?>
							<?= $itemic[9] ?>
							<?= $itemic[10] ?>
						</li>
					</ul>
				</div>
				<div>
					<h2>Главный спонсор</h2>
					<ul>
						<li>
							<?= $itemic[16] ?>
						</li>
						<li>Сумма контракта<br>
							<?= $itemic[17] ?>
						</li>
						<li>Дата заключения контракта<br>
							<?= $itemic[18] ?>
						</li>
						<li>Продолжительность контракта<br>
							<?= $itemic[19] ?> лет
						</li>
					</ul>
				</div>
				<div>
					<h2>Сезон</h2>
					<ul>
						<li>
							<form action="season_infou_club.php" method="post">
								<select name="season_years">
									<option value="">Выберите сезон</option>
									<?php
									while ($row = mysqli_fetch_array($season)) { ?>
										<option value="<?= $row['id'] ?>"><?php echo $row['season_years'] ?></option>;
										<?php
									}
									?>
								</select>
								<input type="hidden" name="club_id" value="<?= $club_id ?>">
								<p><button class="bttn_search" type="submit">Показать статистику по сезону</button></p>
							</form>
						</li>
					</ul>
				</div>
				<div>
					<h2>Состав</h2>
					<?php
					foreach ($roster_hc as $item_igrok) {
						?>
						<div class="roster">
							<a href="\Project\obzor_igroka_user.php?id=<?= $item_igrok[0] ?>"><?= $item_igrok[1] ?></a>
							<?= $item_igrok[2] ?>
							<?= $item_igrok[3] ?>
							<?= $item_igrok[4] ?>
							<?= $item_igrok[5] ?>
							<?= $item_igrok[6] ?>
						</div>
						<?php
					}
					?>
				</div>
				<div>
					<h2>Награды</h2>
					<?= $itemic[25] ?>
				</div>
			</div>
			<?php
		}
		?>
	</div>

</body>

</html>