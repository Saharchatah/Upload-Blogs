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

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$num_per_page = 03;
$start_from = ($page - 1) * 03;


?>


<?php

include("header.php");



?>

<!DOCTYPE html>
<html>

<head>
    <title>My website</title>
</head>

<style>
    body {
        /* display: flex;
    flex-direction: column; */
        background-color: grey;

    }



    .myblogs {

        width: 50%;
        border: 5px solid blue;
        background-color: silver;
        height: 30em;
        text-align: center;
        margin-bottom: 2em;
        margin-left: 10em;
/* font-size: 80%; */

    }

    .imageBlog {

        height: 10em;
        width: 10em;
    }

    .nameFile,
    .formatFile,
    .sizeFile,
    .dateFile {
        float: right;
        color: red;
        margin-right: 20px;
    }


    .mydel {
        float: right;

        margin-right: 30em;
        margin-top: -5rem;
    }

    .mycontent{
       max-width: 20%;;
        color:red;
    }

    .bb {
        color: red;
    }

    .mpp{

        background-color: white;
        float: left;
        font-size: 1.5em;
        padding-left: 2em;

      
    }
/* 
    #md{

        margin-right: 30em;
        margin-top: -5rem;}
     */
</style>

<body>



    <form method="POST">
        <?php

        include("connection.php");

        $userID = $_SESSION['id'];

        $query = "SELECT * FROM blogs limit $start_from, $num_per_page";
        $result = mysqli_query($con, $query);

        $user_data = mysqli_fetch_all($result); //[ [uyub,iyu,iug,iub],[uoyfuy,iu,iu,uh] ]  [ {title:iuhui,}]

        // $_SESSION['bID']=$user_data['blogId'];

        foreach ($user_data as $key => $val) {

            if (is_array($val)) {





                echo "   <div class='myblogs'>
               
                    <h1 class='mycontent'> " . $val[1] . "</h1>
                    <p class='mycontent'>" . $val[2] . "</p>
                    <p class='mycontent'>" . $val[3] . "</p>
                    <div>
                   <a href='" . $val[8] . $val[5] . "' download> <img src='" . $val[8] . $val[5] . "' class='imageBlog' /> </a><br />
                       <span class='nameFile'>" . $val[5] . "</span><br />
                       <span class='formatFile'>" . $val[7] . "</span><br />
                       <span class='sizeFile'>" . $val[6] . "</span><br />
                    </div>
                    <span class='dateFile'>" . $val[4] . "</span>
                    
                 </div>";
            }

            if ($_SESSION['type'] == 1)


                echo "<a id='md' class='mydel' href='deleteA.php?id=" . $val[0] . "'> <img src='delete.png'></a>";
            // <a class='edit' href='update.php?id=" . $val[0] . "'> <img src='edit.png'></a>";
        }  ?>


        <?php

        $pr_query =  "SELECT * FROM blogs";
        $pr_result = mysqli_query($con, $pr_query);
        $total_record = mysqli_num_rows($pr_result);


        $total_page = ceil($total_record / $num_per_page);
        // echo $total_page;


        if ($page > 1) {
            echo "<a class='mpp' href='allBlogs.php?page=" . ($page - 1) . "' class='bb'>Previous</a> ";
        }

        for ($i = 2; $i < $total_page+1; $i++) {
         echo "<a class='mpp' href='allBlogs.php?page=".$i."' class='bb'>$i</a> ";
        }

        if ($page == 1 || $page < $total_page) {
            echo "<a class='mpp' href='allBlogs.php?page=" . ($page + 1) . "' class='bb'>Next</a> ";
        }
        // if($i>$page)
        // {
        //     echo "<a href='allBlogs.php?page=".($page+1)."' class='bb'>next</a> ";

        // }
if($page==$total_page){
    echo "<a class='mpp' href='allBlogs.php?page=" . ($page=1) . "' class='bb'>First</a> ";
}
?>

    </form>

    <!-- <script>
if($b=="undifiend"){}
if($b==undefined){}
if($b==="undifiend"){}

</script> -->
        
</body>

</html>