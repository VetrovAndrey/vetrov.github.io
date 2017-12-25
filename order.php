<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$dbc=mysqli_connect('localhost', 'root', '', 'dish');
if(isset($_POST['id'])) {$id=$_POST['id'];}
if(isset($_POST['nameD'])) {$nameD=$_POST['nameD'];}
if(isset($_POST['price'])) {$price=$_POST['price'];}
if(isset($_POST['time_id'])) {$time_id=$_POST['time_id'];}
if(isset($_POST['weight'])) {$weight=$_POST['weight'];}
if(isset($_POST['order'])) {$order=$_POST['order'];}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Заказ</title>
	<link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="img/Logo.png" sizes="32x16" type="image/png">
</head>
<body>
<div class="container">
	<div class="box">
		<h2>Ваш заказ</h2>
		<?
		foreach($order as $value) {
			$soup=mysqli_query($dbc, "SELECT * FROM dish WHERE id=$value");
			$result=mysqli_fetch_array($soup);
			printf('<span>%s %sруб</span>', $result['nameD'], $result['price']);
			$price[]=$result['price'];
		}
		?>
		<a href="index.php">На главную</a>
		<h3>Стоимость заказа: <?=array_sum($price)?>руб</h3>
	</div>
</div>
</body>
</html>