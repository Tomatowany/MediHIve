<?php

require_once 'database.php';

Class MedicalRecord{
    //attributes

    public $consultationID;
    public $patientID;
    public $staffID;
    public $diagnosis;
    public $datetime;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods

    function add(){
        $sql = "INSERT INTO medical_record (consultationID, patientID, staffID, diagnosis, datetime) VALUES 
        (:consultationID, :patientID, :staffID, :diagnosis, :datetime);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':consultationID', $this->consultationID);
        $query->bindParam(':patientID', $this->patientID);
        $query->bindParam(':staffID', $this->staffID);
        $query->bindParam(':diagnosis', $this->diagnosis);
        $query->bindParam(':datetime', $this->datetime);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function edit(){
        $sql = "UPDATE medical_record SET medical_recordID=:medical_recordID, patientID=:patientID, staffID=:staffID, diagnosis=:diagnosis, datetime=:datetime WHERE medical_recordID = :id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':medical_recordID', $this->medical_recordID);
        $query->bindParam(':patientID', $this->patientID);
        $query->bindParam(':staffID', $this->staffID);
        $query->bindParam(':diagnosis', $this->diagnosis);
        $query->bindParam(':datetime', $this->datetime);
        $query->bindParam(':id', $this->id);    
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function fetch($record_id){
        $sql = "SELECT * FROM medical_record WHERE consultationID = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function show(){
        $sql = "SELECT * FROM medical_record;";
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