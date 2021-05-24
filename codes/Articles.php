<?php
require "db.php";
class article extends DB{

    public function getArticle(){
        
        $answer = $this->conn->prepare('SELECT * FROM articles');
        $answer->execute();
        $stm =$answer->fetchAll();
        return $stm;
        // $result = $answer->setFetchMode(PDO::FETCH_ASSOC);
        // while ($stm =$answer->fetchAll()){ 
        //    echo $stm['author'];
        //      }   
          $stm->closeCursor(); 
          //Elle provoque la « fermeture du curseur d'analyse des résultats ». 
    
}
    public function insertArticle($img, $title, $date, $script){

        $resul = $this->conn->prepare('INSERT INTO articles (`image`, `title`, `datePub`, `description`) VALUES (?,?,?,?)');
        $resul->bindparam(1,$img);
        $resul->bindparam(2,$title);
        $resul->bindparam(3,$date);
        $resul->bindparam(4,$script);
        $resul->execute();

}
  public function getOneAticle($getID){
    $sql=$this->conn->prepare("SELECT * FROM articles WHERE ID = ? ");
    $sql->bindparam(1,$getID);
    $sql->execute();
    $result =$sql->fetch();
        return $result;
  }


  public function updateArticle($img, $title, $date, $script){
    $resul = $this->conn->prepare('UPDATE articles SET `image`= ?,`title`= ?,`datePub`= ?,`description`= ? WHERE ID = ?');
    $resul->bindparam(1,$img);
    $resul->bindparam(2,$title);
    $resul->bindparam(3,$date);
    $resul->bindparam(4,$script);
    $resul->execute();
  }

}















?>