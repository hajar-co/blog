<?php
require "db.php";
class blogger extends DB{
    private $email;
    private $pass;
   
    public function authUser($email,$pass){
        $stm=$this->conn->prepare(("SELECT * FROM  blogger WHERE email=? && password =?"));
        $stm->bindParam(1,$email );
        $stm->bindParam(2,$pass );
        $resul=$stm->execute();
        $resul=$stm->fetch(PDO::FETCH_ASSOC);
        if ($resul) return true;

    }
}

    ?>