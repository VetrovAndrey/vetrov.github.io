<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$dbc=mysqli_connect('localhost', 'root', '', 'dish');
if (isset($_POST['submit'])){
	$username = trim($_POST['username']);
	$password1 = trim($_POST['password']);
	$password2 = trim($_POST['password2']);
	$numbermob = trim($_POST['numbermob']);
	$mail = trim($_POST['email']);
	if (!empty($username) && !empty($password) && !empty($password2) && ($password == $password2) && !empty($numbermob) && !empty($mail)){
		$query = "SELECT * FROM signup WHERE username='$username'";
		$data = mysqli_query($dbc, $query);
		if(mysqli_num_rows($data) == 0) {
			$query = "INSERT INTO signup (username, password, number_mob, email) VALUES ('$username', SHA('$password2'), '$numbermob', '$mail')";
			mysqli_query($dbc, $query);
			echo 'Можете авторизоваться<br>';
			echo '<a href="index.php">Авторизоваться</a>';
			mysqli_close($dbc);
			exit();
		}else{
			echo 'Логин существует';
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Регистрация</title>
	<link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="img/Logo.png" sizes="32x16" type="image/png">
</head>
<body>
		<form method="POST" class="regist" action="<?php echo $_SERVER['PHP_SELF'];?>" onsubmit="valid(this)">
					<div class="regist-one">
						<div class="circle check-in"></div>
						<span>Для входа пройдите регистрацию</span>
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 241.171 241.171" style="enable-background:new 0 0 241.171 241.171;" xml:space="preserve" class="close">
							<path xmlns="http://www.w3.org/2000/svg" id="Close" d="M138.138,120.754l99.118-98.576c4.752-4.704,4.752-12.319,0-17.011c-4.74-4.704-12.439-4.704-17.179,0   l-99.033,98.492L21.095,3.699c-4.74-4.752-12.439-4.752-17.179,0c-4.74,4.764-4.74,12.475,0,17.227l99.876,99.888L3.555,220.497   c-4.74,4.704-4.74,12.319,0,17.011c4.74,4.704,12.439,4.704,17.179,0l100.152-99.599l99.551,99.563   c4.74,4.752,12.439,4.752,17.179,0c4.74-4.764,4.74-12.475,0-17.227L138.138,120.754z"/>
						</svg>
					</div>
					<label for="username">
						<input type="text" name="username" placeholder="Введите логин">
					</label>
					<label for="password">
						<input type="password" name="password" placeholder="Введите пароль">
					</label>
					<label for="password">
						<input type="password" name="password2" placeholder="Введите пароль еще раз">
					</label>
					<label for="number-mob">
						<input type="text" name="numbermob" placeholder="Введите номер телефона">
					</label>
					<label for="mail">
						<input type="text" name="email" placeholder="Введите адрес эл.почты">
					</label>
					<button type="submit" name="submit">Зарегистрироваться</button>
					<a href="index.php">Авторизоваться</a>
		</form>
	<div class="container clearfix">
		<div class="col lg-12 xl-12" style="margin-bottom: 0px !important">
			<header class="clearfix">
				<div></div>
				<div class="nav-box">
					<div>
						<img src="img/Logo.png" width="100">
					</div>
					<nav>
						<a href="#sup">Супы</a>
						<a href="#two">Второе</a>
						<a href="#salad">Салаты</a>
					</nav>
					<a href="javascript:void(0)" class="vxod" id="vxod">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 470 470" style="enable-background:new 0 0 470 470;" xml:space="preserve">
							<path d="M297.5,62.5c-32.723,0-64.571,9.208-92.103,26.628c-26.773,16.94-48.366,40.868-62.445,69.196l26.865,13.352
							C194.089,122.838,243.015,92.5,297.5,92.5C376.075,92.5,440,156.425,440,235s-63.925,142.5-142.5,142.5
							c-54.485,0-103.411-30.338-127.683-79.176l-26.865,13.352c14.079,28.329,35.672,52.256,62.445,69.196
							c27.532,17.42,59.38,26.628,92.103,26.628c95.117,0,172.5-77.383,172.5-172.5S392.617,62.5,297.5,62.5z"/>
							<polygon points="226.894,284.394 248.106,305.606 318.713,235 248.106,164.394 226.894,185.606 261.287,220 0,220 0,250 261.287,250 	"/>
						</svg>	
					</a>
				</div>
			</header>
			<main class="col lg-12 xl-12">
				<section class="banner">
					<div class="banner-one">
						<div>
							<div>
								<img src="img/Logo.png" width="250">
							</div>
							<span>Bananas Foster Ice Cream Cake</span>
							<p>If&nbsp;you&rsquo;re looking for decadence, look no&nbsp;further&nbsp;&mdash; you&rsquo;ve found the Holy Grail of&nbsp;desserts. Honestly, this cake makes&nbsp;us wonder why Bananas Foster hasn&rsquo;t always been served on&nbsp;top of&nbsp;ice cream cake.</p>
							<button href="javascript:void(0)">get it recipe</button>
						</div>
					</div>	
				</section>
				
			</main>
		</div>	
	</div>
	<script src="js/script.js"></script>
</body>
</html>