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
    $img = $_FILES['img'];
        
        $imgName= $img['name'];
        $imgTmp = $img['tmp_name'];
        $imgError = $img['error'];
        $imgType = $img['type'];
 
        $imgExt = explode("." , $imgName);
        $imgActualExt = strtolower(end($imgExt));
    
    $allowedExt = array('jpg', 'jpeg', 'png', 'ai', 'tif');
    if(in_array($imgActualExt, $allowedExt)){
        if($imgError === 0){
            $imgNewName = uniqid("", True).".".$imgActualExt;
            $imgDestin = '../images/'.$imgNewName;
            move_uploaded_file($imgTmp, $imgDestin);
            
        }else{ echo "sorry, this image can't be uploaded ";}

    }else{
        echo "sorry, this image can't be uploaded ";
    }
    $insertArt = new article();
    if($insertArt->insertArticle($imgDestin, $title, $date, $script)){
        header('location:dashboard.php');
    }

}
?>
<form action="insert.php" method="post" enctype="multipart/form-data">
    <label for="">Enter the title:</label>
    <input type="text" name="title" id="" required>
    <label for="script">Enter the article:</label>
    <textarea name="script" id="script" placeholder="Enter your script here" ></textarea>
    <label for="date">Enter the date : </label>
    <input type="date" name="date" id="date">
    <label for="img">Choose an image:</label>
    <input type="file" name="img" id="img" accept="image/*" >
    <!-- <input type="image" src="$imgTmp"> -->
    <!-- <img src="$imgTmp" width="500" height="600"> -->
    <button type="submit" name="insert">Insert</button>
    
</form>

 <hr>
</body>
</html>
