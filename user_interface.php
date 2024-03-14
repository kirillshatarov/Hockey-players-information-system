<?php
session_start();
// if(empty($_SESSION['user'])) {
//     header('Location: index.php');
// }

require_once 'connect.php';
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
	<div class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid navbar navbar-inverse">
			<a class="navbar-brand" href="\Project\user_interface.php">BDHockey</a>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<a href="view_user.php">Обзор игроков</a>
					<a href="\Project\hc\view_club_user.php">Обзор клубов</a>
					<a href="\Project\infou.html">Информация</a>
					<a id="logg" href="logout.php">Выйти</a>
				</div>
			</div>
		</div>
	</div>

	<div id="headerwrap">
		<div class="container">
			<div class="rov centered">
				<div class="col-lg-8 col-lg-ofsset-2">
					<h1>Здесь есть всё, что вы хотите знать о любимых командах и хоккеистах!</h1>
					<h2>информация о хоккеистах</h2>
					<h2>Информация о клубах КХЛ и НХЛ</h2>
				</div>
			</div>
		</div>
	</div>

	<div class="logo">
		<div><a href="\Project\hc\list_club_user.php?league=khl"><img src="img/logo_khl_300.png" alt="КХЛ"></a></div>
		<div><a href="\Project\hc\list_club_user.php?league=nhl"><img src="img/logo_nhl_300.png" alt="НХЛ"></a></div>
	</div>
</body>

</html>