<?php
require "../components/header.php";
require "Articles.php";

$read1Article = new article();
$read1 = $read1Article->getArticle();
?>
<body class="containerIndex">
    <header>
    <div class="logos">
    <svg id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.32 35.6"><defs><style>.cls-1{font-size:30px;font-family:BrushScriptMT, Brush Script MT;}.cls-1,.cls-4{fill:#fcea10;stroke:#ffed00;stroke-miterlimit:10;}.cls-2,.cls-3{fill:#fff;}.cls-2{stroke:#fff;}</style></defs><text class="cls-1" transform="translate(1.1 24.97)">Dev <tspan class="cls-2" x="46.26" y="0">&amp;</tspan><tspan class="cls-3" x="60.97" y="0"> </tspan><tspan x="69.39" y="0">Exp</tspan></text><text x="-47.05" y="-62.36"/><path class="cls-4" d="M204.52,238.71" transform="translate(-47.05 -62.36)"/></svg>
    </div>
    <nav>
    <ul class="ordre">
             <li><a href="#"> our articles</a></li>
             <li><a href="#"> contact us</a></li>
             <li><a href="login.php"> login </a></li>
            </ul>   
    </nav>
    </header>
<?php foreach($read1 as $Article):?>
    <div class="flex-read">
        <div class="containerImage"><img id="img" src="<?=$read1['image'];?>"></div>
        <h3><?=$Article['title'];?></h3>
        <div><?=$Article['description']; ?></div>
        <div><?="published on : ". $Article['datePub']; ?></div>
    </div>
<?php endforeach;?>
</body>
</html>
 