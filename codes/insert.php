<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My blog</title>
</head>
<body>
<?php
require_once ('Articles.php');
if(isset($_POST['insert'])){
    $title = $_POST['title'];
    $script = $_POST['script'];
    $date = $_POST['date'];
    $img = $_POST['img'];
    $insertArt = new articles();
    $insertArt->insertArticle($img, $title, $date, $script);
}
?>
<form action="insert.php" method="post" enctype="multipart/form-data">
    <label for="">Enter the title:</label>
    <input type="text" name="title" id="">
    <label for="script">Enter the article:</label>
    <textarea name="script" id="script" placeholder="Enter your script here" ></textarea>
    <label for="date">Enter the date : </label>
    <input type="date" name="date" id="date">
    <label for="img">Choose an image:</label>
    <input type="file" name="img" id="img" accept="image/*" >
    <!-- <input type="image" src="" alt=""> -->
    <button type="submit" name="insert" >Insert</button>
</form>

 <hr>
</body>
</html>
