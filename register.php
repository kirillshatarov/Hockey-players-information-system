<?php
session_start();
?>

<!doctype html>
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
	<title>Регистрация и авторизация</title>
</head>

<body>

	<div class="container-fluid">

		<div class="new_z">
			<form action="signup.php" method="post">
				<label>ФИО</label>
				<input type="text" name="full_name" placeholder="Введите свое полное имя">
				<label>Логин</label>
				<input type="text" name="login" placeholder="Введите свой логин">
				<label>Почта</label>
				<input type="email" name="email" placeholder="Введите адрес своей почты">
				<label>Пароль</label>
				<input type="password" name="password" placeholder="Введите пароль">
				<label>Подтверждение пароля</label>
				<input type="password" name="password_confirm" placeholder="Подтвердите пароль">
				<button type="submit">Зарегистрироваться</button>
				<p>
					У вас уже есть аккаунт? - <a href="index.php">Войдите</a>!
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
</body>

</html>