<?php

require_once 'database.php';

Class Medicine{
    //attributes

    public $medicineID;
    public $medicineName;
    public $medicineDescription;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods

    function add(){
        $sql = "INSERT INTO medicine (medicineName, medicineDescription) VALUES 
        (:medicineName, :medicineDescription);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':medicineName', $this->medicineName);
        $query->bindParam(':medicineDescription', $this->medicineDescription);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function edit(){
        $sql = "UPDATE medicine SET medicineName=:medicineName, medicineDescription=:medicineDescription WHERE medicineID = :id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':medicineName', $this->medicineName);
        $query->bindParam(':medicineDescription', $this->medicineDescription);
        $query->bindParam(':id', $this->id);    
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function fetch($record_id){
        $sql = "SELECT * FROM medicine WHERE medicineID = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function show(){
        $sql = "SELECT * FROM medicine;";
        $query=$this->db->connect()->prepare($sql);
        $data = null;
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    // function is_product_exist(){
    //     $sql = "SELECT * FROM product WHERE pizzaname = :pizzaname;";
    //     $query=$this->db->connect()->prepare($sql);
    //     $query->bindParam(':pizzaname', $this->pizzaname);
    //     if($query->execute()){
    //         if($query->rowCount()>0){
    //             return true;
    //         }
    //     }
    //     return false;
    // }
}

?>