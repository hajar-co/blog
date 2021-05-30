<?php
require_once ('Articles.php');
require "../components/header.php";

$get1Article = new article();
$get1 = $get1Article->getOneArticle($_GET['id']);

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
           
            echo"hi";
        }
    }else{ echo "sorry, this image can't be uploaded ";}

    }else{
        echo "sorry, this image can't be uploaded ";
    }    
}};
?>
<body>
    <div class="container">
<h3>Update the Article</h3>
<form action="update.php?id=<?=$get1['ID']?>" method="post" class="flex-container" enctype="multipart/form-data">
    <label for="">Edit the title:</label>
    <input value='<?=$get1['title']; ?>' type="text" name="title" id="">
    <label for="script">Edit the article:</label>
    <textarea name="script" id="script" ><?=$get1['description']; ?></textarea>
    <label for="date">Edit the date : </label>
    <input value='<?=$get1['datePub']; ?>' type="date" name="date" id="date">
    <label for="img">Choose an image:</label>
    <!-- <input value='<?=$get1['image']; ?>' type="file" name="img" id="img" accept="image/*" > -->
    <!-- <input type="image" src="$imgTmp"> -->
   <img src="<?=$get1['image']; ?>" width="50" height="40">
    <input type="file" name="img" id="img" accept="image/*" >
    <input type="hidden" name="id" value='<?=$get1['ID'];?>'>
    <button type="submit" name="Edit" class="btn btn-success">Edit </button>
</form>
<a href="dashboard.php" id="cancelBtn"><button type="submit" class="btn btn-primary" >Cancel</button></a>
</div>
</body>
</html>
