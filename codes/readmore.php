<?php
require "../components/header.php";
require "Articles.php";
$read1Article = new article();
$read1 = $read1Article->getOneArticle($_GET['id']);
?>
<body>
<header>
    <div class="logos">
        <svg id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.32 35.6"><defs><style>.cls-1{font-size:30px;font-family:BrushScriptMT, Brush Script MT;}.cls-1,.cls-4{fill:#fcea10;stroke:#ffed00;stroke-miterlimit:10;}.cls-2,.cls-3{fill:#fff;}.cls-2{stroke:#fff;}</style></defs><text class="cls-1" transform="translate(1.1 24.97)">Dev <tspan class="cls-2" x="46.26" y="0">&amp;</tspan><tspan class="cls-3" x="60.97" y="0"> </tspan><tspan x="69.39" y="0">Exp</tspan></text><text x="-47.05" y="-62.36"/><path class="cls-4" d="M204.52,238.71" transform="translate(-47.05 -62.36)"/></svg>
        <div class="icons">
            <i class="fab fa-github"></i>
            <i class="fab fa-linkedin-in"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-facebook-f"></i>
        </div>
    </div>
    <div class="search">
        <input type="search" name="" id="">
        <i class="fas fa-search"></i>
    </div>
    <nav>
    <ul >
             <li><a href="#"> our articles</a></li>
             <li><a href="#"> contact us</a></li>
             <li><a href="login.php"> login </a></li>
            </ul>   
    </nav>
    </header>
    <div class="flex-read">
        <div class="containerImage"><img id="img" src="<?=$read1['image'];?>"></div>
        <h3><?=$read1['title'];?></h3>
        <div><?=$read1['description']; ?></div>
        <div><?="published on : ". $read1['datePub']; ?></div>
        <a href="index.php" class="exitBtn"><button type="submit" class="btn btn-primary">Exit</button></a>
    </div>
</body>
</html>