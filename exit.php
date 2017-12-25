<?php
unset($_COOKIE['user_id']);
unset($_COOKIE['username']);
setcookie('user_id', '', -1, 'index.php');
setcookie('username', '', -1, 'index.php');
$home_url = 'http://' . $_SERVER['HTTP_HOST'];
header('location: '.$home_url);
?>