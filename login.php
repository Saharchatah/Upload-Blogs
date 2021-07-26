<?php

if(isset($_COOKIE['id'])){
	header("Location: index.php");

}


session_start();

include("connection.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
	//something was posted
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];

	// setcookie("username", $user_name , time()+3600*30,'/');

	 if (!empty($user_name) && !empty($password)) {

		//read from database
		$query = "SELECT * FROM users WHERE user_name = '$user_name' AND password ='$password'";
		$result = mysqli_query($con, $query);

		if ($result) {
			if (mysqli_num_rows($result) > 0) {
				$user_data = mysqli_fetch_assoc($result);
				// var_dump($user_data['id']);

					setcookie("id", $user_data['id'], time() + 3600 * 30, '/');

					

			$_SESSION['user_name']=$user_data['user_name'];
			$_SESSION['id']=$user_data['id'];	


			$_SESSION['type']=$user_data['type'];	
// 				var_dump($_SESSION['user_name']);
			
// die;


					header("Location: index.php");
			
				}
				
				else {
					echo "wrong username or password!";
			
		}

	
	} 
	}
}

?>


<!DOCTYPE html>
<html>

<head>
	<title>Login</title>


	<style>
		input {
			width: 100%;
			padding: 12px;
			border: 1px solid #98AFC7;
			border-radius: 4px;
			box-sizing: border-box;
			margin-top: 6px;
			margin-bottom: 16px;
		}

		/* Style the submit button */
		input[type=submit] {
			background-color: #F7E7CE;
			color: black;
			font-size: 1.2em;
		}

		/* Style the container for inputs */
		.container {
			background-color: #566D7E;
			padding: 20px;

		}

		/* The message box is shown when the user clicks on the password field */
		#message {
			display: none;
			background: #f1f1f1;
			color: #000;
			position: relative;
			padding: 20px;
			margin-top: 10px;
		}

		#message p {
			padding: 10px 35px;
			font-size: 18px;
		}

		/* Add a green text color and a checkmark when the requirements are right */

		.mychechbox {

			margin-left: -45em;
			height: 1.5em;

		}
	</style>


	<script>
		function myFunction() {
			var x = document.getElementById("myInput");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}
	</script>


</head>

<body>



	<div id="box">
		<div class="container">
			<form method="post">
				<h2>Log In </h2>


				<label for="usrname">Username</label>
				<input id="text" type="text" name="user_name">

				<label for="password">Password</label>

				<input type="password" name="password" id="myInput">

				<input id="button" type="submit" value="Login">

				<input class="mychechbox" type="checkbox" onclick="myFunction()">
				<a href="signup.php">Click to Signup</a>
			</form>
		</div>
	</div>
</body>

</html>