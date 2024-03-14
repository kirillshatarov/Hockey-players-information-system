<!doctype html>
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
	<title>Поиск</title>
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
	<div class="container-fluid">
		<h2>Результаты поиска</h2><br>
		<?php
		session_start();

		require_once 'connect.php';
		#mysqli_select_db($link, $db);
		$search = $_POST['search'];
		echo "Поисковый запрос: \"" . $search . "\"<br>";
		if (!empty($search)) {
			$query_search = "SELECT * FROM hockey_player WHERE surname LIKE '%$search%' OR name LIKE '%$search%'";
			$result_search = mysqli_query($connect, $query_search);
			while ($array_search = mysqli_fetch_array($result_search)) {
				?>
				<div class="roster">
					<a href="obzor_igroka_user.php?id=<?= $array_search['id'] ?>"><?= $array_search['surname'] . " " . $array_search['name'] ?></a>
				</div>
				<?php

			}
		}
		?>
	</div>

</body>

</html>