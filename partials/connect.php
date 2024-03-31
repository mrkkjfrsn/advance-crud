<?php
class Database {
    private $dbhost = "localhost";
    private $dbuser = "root";
    private $dbpassword = "v.FRcC]LuMIXrB71";
    private $dbname = "advance_crud";
    protected $conn;

    public function __construct()
    {
        try{
        $dsn = "mysql:host={$this->dbhost}; dbname={$this->dbname}; charset=utf8";
        $options = array(PDO::ATTR_PERSISTENT);
        $this->conn = new PDO($dsn, $this->dbuser, $this->dbpassword, $options);
    }catch(PDOException $e){
        echo "Connection error " . $e->getMessage(); 
    }



}
}


?>

