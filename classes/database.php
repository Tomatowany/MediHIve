<?php
class Database {
    private $server = "localhost";
    /*private $dbname = 'crimsbhv_medihive';
    private $user = "crimsbhv";
    private $pass = '*B!9V6f-ctVJ5Q!U';*/
    private $dbname = 'medihive';
    private $user = "root";
    private $pass = '';

    private $connection; // Add a property to hold the MySQLi connection

    public function connect() {
        //$this->$connection = new PDO($this->server, $this->user, $this->pass, $this->dbname);
      	
        try{
            $this->connection = new PDO("mysql:host=$this->server;dbname=$this->dbname", $this->user, $this->pass);  
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        return $this->connection;
    }

    // Add a method to get the MySQLi connection for direct use if needed
    public function getConnection() {
        return $this->connection;
    }
}
?>