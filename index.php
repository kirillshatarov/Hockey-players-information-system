<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Регистрация и авторизация</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
		crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style\mainS.css">
</head>

<body>
	<div class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid navbar navbar-inverse">
			<a class="navbar-brand" href="#">BDHockey</a>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<a id="logg" href="logout.php">Выйти</a>
				</div>
			</div>
		</div>
		<div id="btn">
			<form method="POST">
				<button class="btn btn-primary" id="login" name="Вход/регистрация">Войти/зарегистрироваться</button>
			</form>
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

	<?php
	if (isset($_POST['Вход/регистрация'])) { ?>
		<div class="container">
			<div class="d-flex justify-content-center">
				<form action="signin.php" method="post" id="form_log">
					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Логин</label>
						<input type="text" name="login" class="form-control" aria-describedby="emailHelp"
							placeholder="Введите свой логин">
					</div>
					<div class="mb-3">
						<label for="exampleInputPassword1" class="form-label">Пароль</label>
						<input type="password" name="password" placeholder="Введите свой пароль" class="form-control">
					</div>
					<button id="login" type="submit" class="btn btn-primary">Войти</button>
					<p>
						У вас нет аккаунта? - <a href="register.php">Зарегистрируйтесь</a>!
					</p>

					<?php
					if (isset($_SESSION['message'])) {
						echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
					}
					unset($_SESSION['message']);
					?>

				</form>
			</div>
		</div>
		<?php
	}
	?>
</body>

</html>