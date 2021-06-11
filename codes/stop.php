<?php 
session_start();
if(!isset($_SESSION['Access'])){
    header('location:./login.php');
}

?>