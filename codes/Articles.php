<?php
require "db.php";
class article extends DB{

    public function getArticle(){
        
       
$answer = $this->conn->prepare('SELECT * FROM articles');
$answer->execute();
$stm =$answer->fetchAll();
// return $answer->fetchAll()
return $stm;
// $result = $answer->setFetchMode(PDO::FETCH_ASSOC);
// while ($stm =$answer->fetchAll()){ 
//    echo $stm['author'];
//      }    
    }
    public function insertArticle($img, $title, $date, $script){

 $resul = $this->conn->prepare('INSERT INTO articles (`image`, `title`, `datePub`, `description`) VALUES (?,?,?,?)');
 $resul->bindparam(1,$img);
 $resul->bindparam(1,$title);
 $resul->bindparam(1,$date);
 $resul->bindparam(1,$script);
 $resul->execute();

}


}















?>