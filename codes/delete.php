<?php
require "../components/header.php";
require "Articles.php";
$deleteArticle = new article();
if($deleteArticle->deleteArticle($_GET['id'])){
    header('location: dashboard.php');
}
?>