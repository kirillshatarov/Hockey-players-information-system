<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="\Project\style\mainS.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="\Project\bootstrap\js\bootstrap.min.js"></script>
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

	<div class="logo">
		<div><a href="\Project\hc\list_club_admin.php?league=khl"><img src="\Project\img\logo_khl_300.png"
					alt="КХЛ"></a></div>
		<div><a href="\Project\hc\list_club_admin.php?league=nhl"><img src="\Project\img\logo_nhl_300.png"
					alt="НХЛ"></a></div>
	</div>
</body>

</html>