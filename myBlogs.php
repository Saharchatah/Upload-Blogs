<?php

session_start();
include("connection.php");
include("functions.php");

//$user_data = check_login($con);

if (!isset($_COOKIE['id'])) {
    header("Location: login.php");
}

?>


<?php

include("header.php");


?>

<!DOCTYPE html>
<html>

<head>
    <title>My website</title>


<style>

body{
    /* display: flex;
    flex-direction: column; */
    background-color: grey;

}



.myblogs{

    width:50%;
border: 5px solid blue;
background-color:silver;
height: 30em;
text-align: center;
margin-bottom: 2em;
margin-left: 10em;
font-size: 80%;


}

.imageBlog{

height: 10em;
width: 10em;
} 

.nameFile , .formatFile , .sizeFile , .dateFile {
    float: right;
    color:red;
    margin-right: 20px;
}


.mydel, .edit{
float: right;


}


</style>
    
 
</head>

<body>



    <form method="POST">

        <?php

        include("connection.php");

$rr=$_SESSION['id'];


        $query = "SELECT * FROM blogs WHERE id=$rr";
        $result = mysqli_query($con, $query);

        $user_data = mysqli_fetch_all($result); //[ [uyub,iyu,iug,iub],[uoyfuy,iu,iu,uh] ]  [ {title:iuhui,}]

        foreach ($user_data as $key => $val) {
            if (is_array($val)) {



                echo "<div class='myblogs'>



                    <h1>" . $val[1] . "</h1>
                    <p>" . $val[2] . "</p>
                    <p>" . $val[3] . "</p>


                    
         <div> 
         <a href='" . $val[8] . $val[5] . "' download> <img src='" . $val[8] . $val[5] . "' class='imageBlog' /> </a><br />
                       <span class='nameFile'>" . $val[5] . "</span><br />
                       <span class='formatFile'>" . $val[7] . "</span><br />
                       <span class='sizeFile'>" . $val[6] . "</span><br />
                    </div>
                    <span class='dateFile'>" . $val[4] . "</span>
                    <br/>

                    <a class='mydel' href='deleteA.php?id=".$val[0]."'> <img src='delete.png'></a>
                    <a class='edit' href='update.php?id=".$val[0]."'> <img src='edit.png'></a>
                 </div>";
            }

            

        }
        ?>



    </form>

</body>

</html>