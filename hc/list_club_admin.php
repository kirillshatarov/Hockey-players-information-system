<?php
session_start();

require_once 'connect.php';

$league = $_GET['league'];

$club_nhl = mysqli_query($connect, "SELECT `id`, `name_h` FROM `hockey_club` WHERE hockey_club.league = 'НХЛ'");
$club_nhl = mysqli_fetch_all($club_nhl);

$club_khl = mysqli_query($connect, "SELECT `id`, `name_h` FROM `hockey_club` WHERE hockey_club.league = 'КХЛ'");
$club_khl = mysqli_fetch_all($club_khl);

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
	<title>Клубы</title>
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
					<a href="\Project\new_zapisy_adm.php">Новая запись</a>
					<a href="\Project\adminu.html">Администратору</a>
					<a href="\Project\info.html">Информация</a>
					<a id="logg" href="\Project\logout.php">Выйти</a>
				</div>
			</div>
		</div>
	</div>
	<div class="clubs">
		<?php
		if ($league == 'khl') {
			foreach ($club_khl as $item_khl) {
				?>
				<div>
					<p><a href="\Project\obzor_cluba.php?id=<?= $item_khl[0] ?>"><img src="\Project\img\<?= $item_khl[0] ?>.png"
								alt="<?= $item_khl[1] ?>"></a>
						<?= $item_khl[1] ?>
					</p>
					<div>
						<a href="\Project\update\form_upd_club.php?id=<?= $item_khl[0] ?>">Изменить</a>
						<a href="\Project\delete\delete_zapis_club.php?id=<?= $item_khl[0] ?>">Удалить</a>
					</div>
				</div>
				<?php
			}
		} else {
			foreach ($club_nhl as $item_nhl) {
				?>
				<div>
					<p><a href="\Project\obzor_cluba.php?id=<?= $item_nhl[0] ?>"><img src="\Project\img\<?= $item_nhl[0] ?>.png"
								alt="<?= $item_nhl[1] ?>"></a>
						<?= $item_nhl[1] ?>
					</p>
					<div>
						<a href="\Project\update\form_upd_club.php?id=<?= $item_nhl[0] ?>">Изменить</a>
						<a href="\Project\delete\delete_zapis_club.php?id=<?= $item_nhl[0] ?>">Удалить</a>
					</div>
				</div>
				<?php
			}
		}
		?>
	</div>
</body>

</html>