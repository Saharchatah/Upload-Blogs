<?php
session_start();

include("connection.php");

include("header.php");


$blogid = $_GET['id'];



$query = "SELECT * FROM blogs WHERE blogID=$blogid";
$result = mysqli_query($con, $query);
$user_data = mysqli_fetch_assoc($result);

if (isset($_POST['btn-save'])) {

    $title = $_POST['title'];
    $overview = $_POST['overview'];
    $content = $_POST['editor'];




    if (isset($_FILES['file']) && !empty($_FILES['file']['name'])) {

        $fileName = $_FILES["file"]["name"];
        $fileSize = $_FILES["file"]["size"] / 1024; //in Kb
        $fileFormat = $_FILES["file"]["type"];


        unlink("./upload/".$user_data['name']);

        move_uploaded_file($_FILES["file"]["tmp_name"], realpath('./upload') . '/' . $fileName);


    } else {

        $fileName = $user_data['name'];
        $fileSize = $user_data['size'];
        $fileFormat = $user_data['format'];
    }







    $query = "UPDATE blogs SET title = '$title', overview = '$overview', content = '$content', name = '$fileName', size = $fileSize, format = '$fileFormat'  WHERE blogID = $blogid";
    mysqli_query($con, $query);


    header("Location: myBlogs.php");
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>

    <link rel="stylesheet" href="./Blogs.css">

    <title>update Blog</title>


<style>


.allin{
 
 width: 75%;
 display: flex;
 flex-direction: column;
 border: 9px solid black;
 margin-left: 10em;
 margin-top: -3em;

}


body{
 background-color: grey;
}

#title{
 
 margin-bottom: 1em;
 height: 3em;
 margin-right: 2em;
 margin-left: 2em;
}

#overview{
 margin-bottom: 1em;
 height: 3em;
 margin-right: 2em;
 margin-left: 2em;
}

#editor{
 margin-bottom: 1em;
 height: 3em;
}

.inputfilestyle{
 margin-bottom: 0.5em;
 height: 3em;
}



.savebtn{ 
   
   border: 2px solid blue;
padding: 10px;
border-radius: 25px;
background-color: black;
color: antiquewhite;


}


.savebtn:hover {
background-color: brown;
color: white;
}

.inputfilestyle{
 border: 2px solid blue;
padding: 10px;
border-radius: 25px;
background-color: black;
color: antiquewhite;
margin-top: 1em;
width: 75%;
margin-right: 2em;
 margin-left: 7em;
}

.inputfilestyle:hover {
background-color: brown;
color: white;


}
h1{

 text-align: center;
}

</style>

</head>

<body>

    <form action="" method="post" enctype="multipart/form-data">

        <div class="container containerrad">
            <div class="allin">
                <h1 class="titleBlog">Update BLOG</h1>

                <input type="text" placeholder="Enter Title" value="<?php echo $user_data["title"]; ?>" name="title" id="title" />

                <textarea name="overview" id="overview" placeholder="Overview"> <?php echo $user_data["overview"]; ?></textarea>

                <div class="divofTextarea">
                    <textarea name="editor" id="editor"><?php echo $user_data["content"]; ?></textarea>
                </div>

                <div class="divofFile">
                    <input type="file" name="file" id="inputfilestyle" class="inputfilestyle" />
                </div>

                <button type="submit" name="btn-save" class="savebtn">
                    Save
                </button>
            </div>
        </div>
    </form>

    <script>
        CKEDITOR.replace('editor');
    </script>
    <script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
</body>

</html>