<?php
session_start();

include("connection.php");

$userID = $_SESSION['id'];

if (isset($_POST['btn-save'])) {


    $title = $_POST['title'];
    $overview = $_POST['overview'];
    $content = $_POST['editor'];
    $datePublish = date("Y-m-d H:i:s");

    $fileName = $_FILES["file"]["name"];
    $fileSize = $_FILES["file"]["size"] / 1024; //in Kb
    $fileFormat = $_FILES["file"]["type"];
    $filePath = "upload/";

    $maxSize = 5 * 1024;

    if (isset($_FILES["file"])) {
        if ($fileSize > $maxSize) {
            echo "file > 5 MB";
            return;
        } else if (file_exists(realpath('./upload') . '/' . $fileName)) {
            echo "file alredy exicte";
            return;
        } else {

            $query = "INSERT INTO blogs(title, overview, content, datePublish, name, size, format, path, id) VALUES ('$title', '$overview', '$content', '$datePublish', '$fileName',  $fileSize, '$fileFormat', '$filePath', $userID)";
            mysqli_query($con, $query);

            move_uploaded_file($_FILES["file"]["tmp_name"], realpath('./upload') . '/' . $fileName);
            header("Location: myBlogs.php");
        }
    } else {
        echo "Error: " . $_FILES["file"]["error"];
    }
}

?>

<?php

include("header.php");



?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>

    <link rel="stylesheet" href="./Blogs.css">


    <title>New Blog</title>


    <style>
        .allin {

            width: 75%;
            display: flex;
            flex-direction: column;
            border: 9px solid black;
            margin-left: 10em;
            margin-top: -3em;

        }


        body {
            background-color: grey;
        }

        #title {

            margin-bottom: 1em;
            height: 3em;
            margin-right: 2em;
            margin-left: 2em;
        }

        #overview {
            margin-bottom: 1em;
            height: 3em;
            margin-right: 2em;
            margin-left: 2em;
        }

        #editor {
            margin-bottom: 1em;
            height: 3em;
        }

        .inputfilestyle {
            margin-bottom: 0.5em;
            height: 3em;
        }



        .savebtn {

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

        .inputfilestyle {
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

        h1 {

            text-align: center;
        }
    </style>


</head>

<body>

    <form action="" method="post" enctype="multipart/form-data">

        <div class="container">
            <div class="allin">
                <h1 class="titleBlog">NEW BLOG</h1>

                <input type="text" placeholder="Enter Title" name="title" id="title" required />

                <textarea name="overview" id="overview" placeholder="Overview"></textarea>

                <div class="divofTextarea">
                    <textarea name="editor" id="editor"></textarea>
                </div>

                <div class="divofFile">
                    <input type="file" name="file" id="inputfilestyle" class="inputfilestyle" required />
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