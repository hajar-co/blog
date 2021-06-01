<?php
require "../components/header.php";
require "Articles.php";
$read1Article = new article();
$read1 = $read1Article->getOneArticle($_GET['id']);
?>
<body>
    <div class="flex-read">
        <div class="containerImage"><img id="img" src="<?=$read1['image'];?>"></div>
        <h3><?=$read1['title'];?></h3>
        <div><?=$read1['description']; ?></div>
        <div><?="published on : ". $read1['datePub']; ?></div>
        <a href="dashboard.php" class="exitBtn"><button type="submit" class="btn btn-primary">Exit</button></a>
    </div>
</body>
</html>