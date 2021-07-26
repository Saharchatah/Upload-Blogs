<?php

session_start();

include("connection.php");


$blogid = $_GET['id'];


$query = "SELECT name FROM blogs WHERE blogID=$blogid";
$result = mysqli_query($con, $query);


$user_data = mysqli_fetch_array($result);




unlink("./upload/".$user_data[0]);


$queryy = "DELETE FROM blogs WHERE blogID=$blogid";
$resultt = mysqli_query($con, $queryy);


header("Location: allBlogs.php");

?>