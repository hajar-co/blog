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
// if(isset($_POST['Edit'])){
//     $title = $_POST['title'];
//     $script = $_POST['script'];
//     $date = $_POST['date'];
//     $img = $_FILES['img'];
        
//         $imgName= $img['name'];
//         $imgTmp = $img['tmp_name'];
//         $imgError = $img['error'];
//         $imgType = $img['type'];
 
//         $imgExt = explode("." , $imgName);
//         $imgActualExt = strtolower(end($imgExt));
    
//     $allowedExt = array('jpg', 'jpeg', 'png', 'ai', 'tif');
//     if(in_array($imgActualExt, $allowedExt)){
//         if($imgError === 0){
//             $imgNewName = uniqid("", True).".".$imgActualExt;
//             $imgDestin = '../images/'.$imgNewName;
//             move_uploaded_file($imgTmp, $imgDestin);
            
//         }else{ echo "sorry, this image can't be uploaded ";}

//     }else{
//         echo "sorry, this image can't be uploaded ";
//     }
//     $editArt = new article();
//     if($edittArt->updateArticle($imgDestin, $title, $date, $script)){
//         header('location:dashboard.php');
//     }

// }

$get1Article = new article();
if($get1 = $get1Article->getOneArticle($_GET['id'])){
    header('location: dashboard.php');
};

     


if(isset($_POST['Edit']) ){

    if(!empty($imgName)){
        $title = $_POST['title'];
        $script = $_POST['script'];
        $date = $_POST['date'];
        $ID = $_POST['id'];
        $img = $_FILES['img'];
        
            $imgName = $img['name'];
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
        $updateArticle = new article();
        if($updateArticle->updateArticle($imgDestin, $title, $date, $script, $ID)){
            header('location: dashboard.php');
        }
    }else{ echo "sorry, this image can't be uploaded ";}

    }else{
        echo "sorry, this image can't be uploaded ";
    }    
}};
?>
<h2>Update the Article</h2>
<form action="update.php" method="post" enctype="multipart/form-data">
    <label for="">Edit the title:</label>
    <input value='<?=$get1['title']; ?>' type="text" name="title" id="" required>
    <label for="script">Edit the article:</label>
    <textarea name="script" id="script" ><?=$get1['description']; ?></textarea>
    <label for="date">Edit the date : </label>
    <input value='<?=$get1['datePub']; ?>' type="date" name="date" id="date">
    <label for="img">Choose an image:</label>
    <!-- <input value='<?=$get1['image']; ?>' type="file" name="img" id="img" accept="image/*" > -->
    <!-- <input type="image" src="$imgTmp"> -->
    <!-- <img src="$imgTmp" width="500" height="600"> -->
    <input type="file" name="img" id="img" accept="image/*" >
    <input name="id" value='<?=$get1['ID'];?>'>
    <button type="submit" name="Edit">Edit </button>
    
</form>

 <hr>
</body>
</html>
