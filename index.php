<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$dbc=mysqli_connect('localhost', 'root', '', 'dish');
if(isset($_POST['id'])) {$id=$_POST['id'];}
if(isset($_POST['nameD'])) {$nameD=$_POST['nameD'];}
if(isset($_POST['price'])) {$price=$_POST['price'];}
if(isset($_POST['time_id'])) {$time_id=$_POST['time_id'];}
if(isset($_POST['weight'])) {$weight=$_POST['weight'];}
if(isset($_POST['order'])) {$order=$_POST['order'];}
$order= array();
if (!isset($_COOKIE['user_id'])){
	if(isset($_POST['submit'])){
		$user_username = trim($_POST['username']);
		$user_password = trim($_POST['password']);
		if(!empty($user_username) && !empty($user_password)){
			$query = "SELECT user_id, username FROM signup WHERE username = '$user_username' AND password = SHA('$user_password')";
			$data=mysqli_query($dbc,$query);
			if(mysqli_num_rows($data) == 1){
				$row = mysqli_fetch_assoc($data);
				setcookie('user_id', $row['user_id'], time() + (60*60*24*30));
				setcookie('username', $row['username'], time() + (60*60*24*30));
				$home_url='http://'.$_SERVER['HTTP_HOST'];
				header('location: '.$home_url);
			}
		}else{
			echo '';
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Restaurant</title>
	<link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="img/Logo.png" sizes="32x16" type="image/png">
</head>
<body>
	<a href="#logotip" class="return">
			<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 		width="100%" height="100%" viewBox="0 0 284.929 284.929" style="enable-background:new 0 0 284.929 284.929;"
	 		xml:space="preserve">
				<path d="M282.082,195.285L149.028,62.24c-1.901-1.903-4.088-2.856-6.562-2.856s-4.665,0.953-6.567,2.856L2.856,195.285
				C0.95,197.191,0,199.378,0,201.853c0,2.474,0.953,4.664,2.856,6.566l14.272,14.271c1.903,1.903,4.093,2.854,6.567,2.854
				c2.474,0,4.664-0.951,6.567-2.854l112.204-112.202l112.208,112.209c1.902,1.903,4.093,2.848,6.563,2.848
				c2.478,0,4.668-0.951,6.57-2.848l14.274-14.277c1.902-1.902,2.847-4.093,2.847-6.566
				C284.929,199.378,283.984,197.188,282.082,195.285z"/>
			</svg>
		</a>
<?php
	if(empty($_COOKIE['username'])){
?>
		<form method="POST" class="regist" action="<?php echo $_SERVER['PHP_SELF'];?>" onsubmit="valid(this)">
					<div class="regist-one">
						<div class="circle authorization"></div>
						<span>Авторизация</span>
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 241.171 241.171" style="enable-background:new 0 0 241.171 241.171;" xml:space="preserve" class="close">
							<path xmlns="http://www.w3.org/2000/svg" id="Close" d="M138.138,120.754l99.118-98.576c4.752-4.704,4.752-12.319,0-17.011c-4.74-4.704-12.439-4.704-17.179,0   l-99.033,98.492L21.095,3.699c-4.74-4.752-12.439-4.752-17.179,0c-4.74,4.764-4.74,12.475,0,17.227l99.876,99.888L3.555,220.497   c-4.74,4.704-4.74,12.319,0,17.011c4.74,4.704,12.439,4.704,17.179,0l100.152-99.599l99.551,99.563   c4.74,4.752,12.439,4.752,17.179,0c4.74-4.764,4.74-12.475,0-17.227L138.138,120.754z"/>
						</svg>
					</div>
					<label for="username">
						<input type="text" name="username" placeholder="Введите логин" id="username">
					</label>
					<label for="password">
						<input type="password" name="password" placeholder="Введите пароль">
					</label>
					<button type="submit" name="submit">Войти</button>
					<a href="signup.php">Регистрация</a>	
		</form>
<?php
}else{
	?>
	<div class="exit">
		<h2>АВТОРИЗОВАН</h2>
		<h2><a href="exit.php">Выйти</a></h2>
	</div>
<?php	
}
?>
	<div class="container clearfix">
		<div class="col lg-12 xl-12" style="margin-bottom: 0px !important">
			<header class="clearfix">
				<div id="logotip"></div>
				<div class="nav-box">
					<div>
						<img src="img/Logo.png" width="100">
					</div>
					<nav id="menu">
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
				<section class="history">
				</section>
				<section class="menu">
					<div class="container">
						<form class ="order" name="order" method="post" action="order.php">
							<h2 id="sup">Супы</h2>
								<div>
										<?
										$soup=mysqli_query($dbc, "SELECT * FROM dish WHERE time_id=1");
										$result=mysqli_fetch_array($soup);
										do{
										echo '<div>';
											echo'<div class="modal">';
												echo "<span>Состав: ".$result['composition']."</span>";
												printf('<span>Цена %sруб</span>',$result['price']);
											echo "</div>";
											echo "<img src='img/Photo-one.jpg'width='100%'>";
											printf('<label class="after"><input type="checkbox" name="order[]" value="%s">%s</label>', $result['id'],$result['nameD']);
										echo '</div>';
										}
										while ($result=mysqli_fetch_array($soup));
										?>
								</div>
							<h2 id="two">Второе</h2>
								<div>
									<?
										$two_dish=mysqli_query($dbc, "SELECT * FROM dish WHERE time_id=2");
										$result=mysqli_fetch_array($two_dish);
										do{
										echo '<div>';
											echo'<div class="modal">';
												echo "<span>Состав: из бла бла бла бла бла бла бла бла бла</span>";
												printf('<span>Цена %sруб</span>',$result['price']);
											echo "</div>";
											echo "<img src='img/Photo-one.jpg'width='100%'>";
											printf('<label class="after"><input type="checkbox" name="order[]" value="%s">%s</label>', $result['id'],$result['nameD']);
										echo '</div>';
										}
										while ($result=mysqli_fetch_array($two_dish));
										?>
								</div>
							<h2 id="salad">Салаты</h2>
								<div>
									<?
										$salad=mysqli_query($dbc, "SELECT * FROM dish WHERE time_id=3");
										$result=mysqli_fetch_array($salad);
										do{
										echo '<div>';
											echo'<div class="modal">';
												echo "<span>Состав: из бла бла бла бла бла бла бла бла бла</span>";
												printf('<span>Цена %sруб</span>',$result['price']);
											echo "</div>";
											echo "<img src='img/Photo-one.jpg'width='100%'>";
											printf('<label class="after"><input type="checkbox" name="order[ ]" value="%s">%s</label>', $result['id'],$result['nameD']);
										echo '</div>';
										}
										while ($result=mysqli_fetch_array($salad));
										?>
								</div>
							   <?if (!isset($_SESSION['user_id']) && isset($_COOKIE['user_id'])) 
								    $_SESSION['user_id'] = $_COOKIE['user_id']; 
									$user = $_SESSION['user_id'];  
								if ($user == null) 
								{ ?>
								<a href="javascript:void(0)" class="avtoriz" id="avtoriz">
								 <input type="button" class="order-button"  name="zak" value="Для того чтобы заказать пройдите авторизацию">
								 </a>
								<?} else {?>
								<input type="submit"  name="zak-sub" value="Заказать">
								<?}?>
						</form>
					</div>
				</section>
			</main>
		</div>	
	</div>
			<footer class="col lg-12 xl-12 clearfix">
				<div class="container">
					<div>
						<img src="img/Logo-white.png" width="100">
					</div>
					<nav>
						<a href="#sup">Супы</a>
						<a href="#two">Второе</a>
						<a href="#salad">Салаты</a>
					</nav>
					<div class="last-footer">
						<span>2016-2017 LEMON. All right reserved</span>
						<a href="javascript:void(0)">
							<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							 viewBox="0 0 548.358 548.358" style="enable-background:new 0 0 548.358 548.358;"
							 xml:space="preserve">
								<path d="M545.451,400.298c-0.664-1.431-1.283-2.618-1.858-3.569c-9.514-17.135-27.695-38.167-54.532-63.102l-0.567-0.571
								l-0.284-0.28l-0.287-0.287h-0.288c-12.18-11.611-19.893-19.418-23.123-23.415c-5.91-7.614-7.234-15.321-4.004-23.13
								c2.282-5.9,10.854-18.36,25.696-37.397c7.807-10.089,13.99-18.175,18.556-24.267c32.931-43.78,47.208-71.756,42.828-83.939
								l-1.701-2.847c-1.143-1.714-4.093-3.282-8.846-4.712c-4.764-1.427-10.853-1.663-18.278-0.712l-82.224,0.568
								c-1.332-0.472-3.234-0.428-5.712,0.144c-2.475,0.572-3.713,0.859-3.713,0.859l-1.431,0.715l-1.136,0.859
								c-0.952,0.568-1.999,1.567-3.142,2.995c-1.137,1.423-2.088,3.093-2.848,4.996c-8.952,23.031-19.13,44.444-30.553,64.238
								c-7.043,11.803-13.511,22.032-19.418,30.693c-5.899,8.658-10.848,15.037-14.842,19.126c-4,4.093-7.61,7.372-10.852,9.849
								c-3.237,2.478-5.708,3.525-7.419,3.142c-1.715-0.383-3.33-0.763-4.859-1.143c-2.663-1.714-4.805-4.045-6.42-6.995
								c-1.622-2.95-2.714-6.663-3.285-11.136c-0.568-4.476-0.904-8.326-1-11.563c-0.089-3.233-0.048-7.806,0.145-13.706
								c0.198-5.903,0.287-9.897,0.287-11.991c0-7.234,0.141-15.085,0.424-23.555c0.288-8.47,0.521-15.181,0.716-20.125
								c0.194-4.949,0.284-10.185,0.284-15.705s-0.336-9.849-1-12.991c-0.656-3.138-1.663-6.184-2.99-9.137
								c-1.335-2.95-3.289-5.232-5.853-6.852c-2.569-1.618-5.763-2.902-9.564-3.856c-10.089-2.283-22.936-3.518-38.547-3.71
								c-35.401-0.38-58.148,1.906-68.236,6.855c-3.997,2.091-7.614,4.948-10.848,8.562c-3.427,4.189-3.905,6.475-1.431,6.851
								c11.422,1.711,19.508,5.804,24.267,12.275l1.715,3.429c1.334,2.474,2.666,6.854,3.999,13.134c1.331,6.28,2.19,13.227,2.568,20.837
								c0.95,13.897,0.95,25.793,0,35.689c-0.953,9.9-1.853,17.607-2.712,23.127c-0.859,5.52-2.143,9.993-3.855,13.418
								c-1.715,3.426-2.856,5.52-3.428,6.28c-0.571,0.76-1.047,1.239-1.425,1.427c-2.474,0.948-5.047,1.431-7.71,1.431
								c-2.667,0-5.901-1.334-9.707-4c-3.805-2.666-7.754-6.328-11.847-10.992c-4.093-4.665-8.709-11.184-13.85-19.558
								c-5.137-8.374-10.467-18.271-15.987-29.691l-4.567-8.282c-2.855-5.328-6.755-13.086-11.704-23.267
								c-4.952-10.185-9.329-20.037-13.134-29.554c-1.521-3.997-3.806-7.04-6.851-9.134l-1.429-0.859c-0.95-0.76-2.475-1.567-4.567-2.427
								c-2.095-0.859-4.281-1.475-6.567-1.854l-78.229,0.568c-7.994,0-13.418,1.811-16.274,5.428l-1.143,1.711
								C0.288,140.146,0,141.668,0,143.763c0,2.094,0.571,4.664,1.714,7.707c11.42,26.84,23.839,52.725,37.257,77.659
								c13.418,24.934,25.078,45.019,34.973,60.237c9.897,15.229,19.985,29.602,30.264,43.112c10.279,13.515,17.083,22.176,20.412,25.981
								c3.333,3.812,5.951,6.662,7.854,8.565l7.139,6.851c4.568,4.569,11.276,10.041,20.127,16.416
								c8.853,6.379,18.654,12.659,29.408,18.85c10.756,6.181,23.269,11.225,37.546,15.126c14.275,3.905,28.169,5.472,41.684,4.716h32.834
								c6.659-0.575,11.704-2.669,15.133-6.283l1.136-1.431c0.764-1.136,1.479-2.901,2.139-5.276c0.668-2.379,1-5,1-7.851
								c-0.195-8.183,0.428-15.558,1.852-22.124c1.423-6.564,3.045-11.513,4.859-14.846c1.813-3.33,3.859-6.14,6.136-8.418
								c2.282-2.283,3.908-3.666,4.862-4.142c0.948-0.479,1.705-0.804,2.276-0.999c4.568-1.522,9.944-0.048,16.136,4.429
								c6.187,4.473,11.99,9.996,17.418,16.56c5.425,6.57,11.943,13.941,19.555,22.124c7.617,8.186,14.277,14.271,19.985,18.274
								l5.708,3.426c3.812,2.286,8.761,4.38,14.853,6.283c6.081,1.902,11.409,2.378,15.984,1.427l73.087-1.14
								c7.229,0,12.854-1.197,16.844-3.572c3.998-2.379,6.373-5,7.139-7.851c0.764-2.854,0.805-6.092,0.145-9.712
								C546.782,404.25,546.115,401.725,545.451,400.298z"/>
							</svg>
						</a>
						<a href="javascript:void(0)">
							<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							 viewBox="0 0 95.481 95.481" style="enable-background:new 0 0 95.481 95.481;"
							 xml:space="preserve">
								<path d="M43.041,67.254c-7.402-0.772-14.076-2.595-19.79-7.064c-0.709-0.556-1.441-1.092-2.088-1.713
									c-2.501-2.402-2.753-5.153-0.774-7.988c1.693-2.426,4.535-3.075,7.489-1.682c0.572,0.27,1.117,0.607,1.639,0.969
									c10.649,7.317,25.278,7.519,35.967,0.329c1.059-0.812,2.191-1.474,3.503-1.812c2.551-0.655,4.93,0.282,6.299,2.514
									c1.564,2.549,1.544,5.037-0.383,7.016c-2.956,3.034-6.511,5.229-10.461,6.761c-3.735,1.448-7.826,2.177-11.875,2.661
									c0.611,0.665,0.899,0.992,1.281,1.376c5.498,5.524,11.02,11.025,16.5,16.566c1.867,1.888,2.257,4.229,1.229,6.425
									c-1.124,2.4-3.64,3.979-6.107,3.81c-1.563-0.108-2.782-0.886-3.865-1.977c-4.149-4.175-8.376-8.273-12.441-12.527
									c-1.183-1.237-1.752-1.003-2.796,0.071c-4.174,4.297-8.416,8.528-12.683,12.735c-1.916,1.889-4.196,2.229-6.418,1.15
									c-2.362-1.145-3.865-3.556-3.749-5.979c0.08-1.639,0.886-2.891,2.011-4.014c5.441-5.433,10.867-10.88,16.295-16.322
									C42.183,68.197,42.518,67.813,43.041,67.254z"/>
								<path d="M47.55,48.329c-13.205-0.045-24.033-10.992-23.956-24.218C23.67,10.739,34.505-0.037,47.84,0
									c13.362,0.036,24.087,10.967,24.02,24.478C71.792,37.677,60.889,48.375,47.55,48.329z M59.551,24.143
									c-0.023-6.567-5.253-11.795-11.807-11.801c-6.609-0.007-11.886,5.316-11.835,11.943c0.049,6.542,5.324,11.733,11.896,11.709
									C54.357,35.971,59.573,30.709,59.551,24.143z"/>
							</svg>
						</a>
						<a href="javascript:void(0)">
							<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							viewBox="0 0 169.063 169.063" style="enable-background:new 0 0 169.063 169.063;"
							 xml:space="preserve">
								<path d="M122.406,0H46.654C20.929,0,0,20.93,0,46.655v75.752c0,25.726,20.929,46.655,46.654,46.655h75.752
									c25.727,0,46.656-20.93,46.656-46.655V46.655C169.063,20.93,148.133,0,122.406,0z M154.063,122.407
									c0,17.455-14.201,31.655-31.656,31.655H46.654C29.2,154.063,15,139.862,15,122.407V46.655C15,29.201,29.2,15,46.654,15h75.752
									c17.455,0,31.656,14.201,31.656,31.655V122.407z"/>
								<path d="M84.531,40.97c-24.021,0-43.563,19.542-43.563,43.563c0,24.02,19.542,43.561,43.563,43.561s43.563-19.541,43.563-43.561
									C128.094,60.512,108.552,40.97,84.531,40.97z M84.531,113.093c-15.749,0-28.563-12.812-28.563-28.561
									c0-15.75,12.813-28.563,28.563-28.563s28.563,12.813,28.563,28.563C113.094,100.281,100.28,113.093,84.531,113.093z"/>
								<path d="M129.921,28.251c-2.89,0-5.729,1.17-7.77,3.22c-2.051,2.04-3.23,4.88-3.23,7.78c0,2.891,1.18,5.73,3.23,7.78
									c2.04,2.04,4.88,3.22,7.77,3.22c2.9,0,5.73-1.18,7.78-3.22c2.05-2.05,3.22-4.89,3.22-7.78c0-2.9-1.17-5.74-3.22-7.78
									C135.661,29.421,132.821,28.251,129.921,28.251z"/>
							</svg>
						</a>
						<a href="javascript:void(0)">
							<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							viewBox="0 0 96.124 96.123" style="enable-background:new 0 0 96.124 96.123;"
							 xml:space="preserve">
								<path d="M72.089,0.02L59.624,0C45.62,0,36.57,9.285,36.57,23.656v10.907H24.037c-1.083,0-1.96,0.878-1.96,1.961v15.803
								c0,1.083,0.878,1.96,1.96,1.96h12.533v39.876c0,1.083,0.877,1.96,1.96,1.96h16.352c1.083,0,1.96-0.878,1.96-1.96V54.287h14.654
								c1.083,0,1.96-0.877,1.96-1.96l0.006-15.803c0-0.52-0.207-1.018-0.574-1.386c-0.367-0.368-0.867-0.575-1.387-0.575H56.842v-9.246
								c0-4.444,1.059-6.7,6.848-6.7l8.397-0.003c1.082,0,1.959-0.878,1.959-1.96V1.98C74.046,0.899,73.17,0.022,72.089,0.02z"/>
							</svg>
						</a>
					</div>
				</div>
			</footer>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script type="text/javascript">
		 $(document).ready(function(){
		    $("#menu").on("click","a", function (event) {
		        event.preventDefault();
		        var id  = $(this).attr('href'),
		            top = $(id).offset().top;
		        $('body,html').animate({scrollTop: top}, 1500);
		    });
		});
	</script>
	</script>
	<script src="js/script.js"></script>
</body>
</html>