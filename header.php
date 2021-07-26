<!-- 
<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        nav {
            background-color: #2F4F4F;
           
            float: right;
            width: 100%;
            margin-top: -1em;


        }

        .head {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
            list-style: none;

            float: right;

            
        }

        a {
            text-decoration: none;
            color: black;
            font-weight: bold;
            font-size: 1.3em;
            
        }

        a:hover {
            background-color: #00FFFF;

        }

        .nee{
            margin-left: 1em;
        }
    </style>
</head>

<body>


    <nav>

        <ul class="head">
            <li class="nee"><a href="./index.php">home</a></li>

            <li class="nee"  ><a href="./allBlogs.php">All Blogs</a></li>
            <li class="nee"  ><a href="./myBlogs.php">My Blogs</a></li>
            <li class="nee"  ><a href="./addBlogs.php">Add Blogs</a></li>

          <li  class="nee" > <a> <?php   echo "weclome-"; echo $_SESSION['user_name']; ?> </a> </li>
          <li  class="nee" >   <a href="logout.php">Logout</a></li>


           <?php 
          
          
         if($_SESSION['type']==1) 
       echo "Admin Panel"; 
         
         ?> 

            

        </ul>
    </nav>

</body>

</html> -->




<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

.foradmin{
  background-color: red;
  text-align: center;
}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
<div class="foradmin">
  <?php if($_SESSION['type']==1) 
        echo "you are a Admin"; ?> </div>
  <a style="font-size: 20px; background-color:darkcyan; color:black"> <?php   echo "weclome-"; echo $_SESSION['user_name']; ?> </a>

  <a href="./index.php">home</a></li>
  <a href="./allBlogs.php">All Blogs</a>
  <a href="./myBlogs.php">My Blogs</a>
  <a href="./addBlogs.php">Add Blogs</a>
  <a href="logout.php">Logout</a>
 


          
          
</div>

<div id="main">
  <!-- <h2>Sidenav Push Example</h2> -->
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
</div>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
   
</body>
</html> 
