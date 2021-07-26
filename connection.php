<?php



// $userFromCookie = $_COOKIE["username"];

// if (isset($_COOKIE["username"]) && $_COOKIE["username"] != "" && !isset($_SESSION["user_id"])) {
// 	$_SESSION["username"] = $_COOKIE["username"];
// }

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "Ex2Blogs";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("failed to connect!");
}
