<?php

require_once 'database.php';

Class Allergy{
    //attributes

    public $id;
    public $allergyName;
    public $allergyDescription;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods

    function add(){
        $sql = "INSERT INTO allergy (allergyName, allergyDescription) VALUES 
        (:allergyName, :allergyDescription);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':allergyName', $this->allergyName);
        $query->bindParam(':allergyDescription', $this->allergyDescription);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function edit(){
        $sql = "UPDATE allergy SET allergyName=:allergyName, allergyDescription=:allergyDescription WHERE allergyID = :id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':allergyName', $this->allergyName);
        $query->bindParam(':allergyDescription', $this->allergyDescription);
        $query->bindParam(':id', $this->id);    
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function fetch($record_id){
        $sql = "SELECT * FROM allergy WHERE allergyID = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function show(){
        $sql = "SELECT * FROM allergy;";
        $query=$this->db->connect()->prepare($sql);
        $data = null;
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function is_product_exist(){
        $sql = "SELECT * FROM product WHERE pizzaname = :pizzaname;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':pizzaname', $this->pizzaname);
        if($query->execute()){
            if($query->rowCount()>0){
                return true;
            }
        }
        return false;
    }
}

?>