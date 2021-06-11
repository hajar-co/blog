<?php
class DB{
    protected $dbhostName = "mysql:host=localhost;dbname=blog";
    protected $dbuser = "root";
    protected $dbpassword = "";
    public $conn;
    public function __Construct(){
        try {
            $this->conn = new PDO($this->dbhostName, $this->dbuser, $this->dbpassword);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }             
            catch (PDOException $th) {
                echo"connection failed" . $th->getMessage();
            };
    }
    public function __Destruct(){
       $this->conn = null;
    }

}

?>