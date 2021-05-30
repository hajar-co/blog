
<?php
require "../components/header.php";
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
            $insertArt = new article();
            if($insertArt->insertArticle($imgDestin, $title, $date, $script)){
                header('location: dashboard.php');
            }
        }else{ echo "sorry, this image can't be uploaded ";}

    }else{
        echo "sorry, this image can't be uploaded ";
    }

}
?>
<body>
    <div class="container">
        <h3>Insert an article</h3>
<form class="flex-container" action="insert.php" method="post" enctype="multipart/form-data">
    <label for="">Enter the title:</label>
    <input type="text" name="title" id="" required>
    <label for="script">Enter the article:</label>
    <textarea name="script" id="script" placeholder="Enter your script here" ></textarea>
    <label for="date">Enter the date : </label>
    <input type="date" name="date" id="date">
    <label for="img">Choose an image:</label>
    <input type="file" name="img" id="img" accept="image/*" >
    <button type="submit" name="insert" class="btn btn-success">Insert</button>
</form>
<a href="dashboard.php" id="cancelBtn"><button type="submit" class="btn btn-primary" >Cancel</button></a>
 </div>
</body>
</html>
