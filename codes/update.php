<?php
require './stop.php';
require_once('Articles.php');
require "../components/header.php";

$get1Article = new article();
$get1 = $get1Article->getOneArticle($_GET['id']);

if (isset($_POST['Edit'])) {
        $title = $_POST['title'];
        $script = $_POST['script'];
        $date = $_POST['date'];
        $ID = $_POST['id'];
    if (!empty($_FILES['img']['name'])) {

        $img = $_FILES['img'];
        $imgName = $img['name'];
        $imgTmp = $img['tmp_name'];
        $imgError = $img['error'];

        $imgExt = explode(".", $imgName);
        $imgActualExt = strtolower(end($imgExt));

        $allowedExt = array('jpg', 'jpeg', 'png', 'ai', 'tif');
        if (in_array($imgActualExt, $allowedExt)) {
            if ($imgError === 0) {
                $imgNewName = uniqid("", True) . "." . $imgActualExt;
                $imgDestin = '../images/' . $imgNewName;
                move_uploaded_file($imgTmp, $imgDestin);
            }
        }else {
            $imgDestin = $_POST["oldImg"];
        }
    } else {
        $imgDestin = $_POST["oldImg"];
    }

    $updateArticle = new article();
    if ($updateArticle->updateArticle($imgDestin, $title, $date, $script, $ID)) {
        header('location: dashboard.php');
    }
};
?>

<body>
    <div class="container">
        <h3>Update the Article</h3>
        <form action="update.php?id=<?= $get1['ID'] ?>" method="post" class="flex-container" enctype="multipart/form-data">
            <label for="">Edit the title:</label>
            <input value='<?= $get1['title']; ?>' type="text" name="title" id="">
            <label for="script">Edit the article:</label>
            <textarea name="script" id="script"><?= $get1['description']; ?></textarea>
            <label for="date">Edit the date : </label>
            <input value='<?= $get1['datePub']; ?>' type="date" name="date" id="date">
            <label for="img">Choose an image:</label>
            <!-- <input value='<?= $get1['image']; ?>' type="file" name="img" id="img" accept="image/*" > -->

            <img src="<?= $get1['image']; ?>" width="50" height="40">
            <input type="file" name="img" id="img" accept="image/*">
            <input type="hidden" name="id" value='<?= $get1['ID']; ?>'>
            <input value='<?= $get1['image']; ?>' type="hidden" name="oldImg" id="img">
            <button type="submit" name="Edit" class="btn btn-success">Edit</button>
        </form>
        <a href="dashboard.php" id="cancelBtn"><button type="submit" class="btn btn-primary">Cancel</button></a>
    </div>
</body>

</html>