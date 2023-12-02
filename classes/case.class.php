<?php

require_once 'database.php';

Class Casee{
    //attributes

    public $id;
    public $caseName;
    public $caseDescription;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods

    function add(){
        $sql = "INSERT INTO casetbl (caseName, caseDescription) VALUES 
        (:caseName, :caseDescription);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':caseName', $this->caseName);
        $query->bindParam(':caseDescription', $this->caseDescription);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function edit(){
        $sql = "UPDATE casetbl SET caseName=:caseName, caseDescription=:caseDescription WHERE caseID = :id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':caseName', $this->caseName);
        $query->bindParam(':caseDescription', $this->caseDescription);
        $query->bindParam(':id', $this->id);    
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function delete(){
        $sql = "DELETE FROM casetbl WHERE caseID =:id;";

        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function fetch($record_id){
        $sql = "SELECT * FROM casetbl WHERE caseID = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function show(){
        $sql = "SELECT * FROM casetbl;";
        $query=$this->db->connect()->prepare($sql);
        $data = null;
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function is_email_exist(){
        $sql = "SELECT * FROM staff WHERE email = :email;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':email', $this->email);
        if($query->execute()){
            if($query->rowCount()>0){
                return true;
            }
        }
        return false;
    }
}

?>