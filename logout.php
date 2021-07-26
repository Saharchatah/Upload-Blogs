<?php

// session_start();

// if(isset($_SESSION['user_id']))
// {
// 	unset($_SESSION['user_id']);

// }

// header("Location: login.php");

setcookie("id", $user_data['id'], time()-3600*30,'/');

header("Location: login.php");


?>