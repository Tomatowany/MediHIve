<?php

require_once 'database.php';

Class Patient{
    //attributes

    public $patientID;
    public $staffID;
    public $pFName;
    public $pLName;
    public $patientType;
    public $bloodType;
    public $birthdate;
    public $address;
    public $contactNo;
    public $civilStatus;
    public $nationality;
    public $sex;
    public $occupation;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods

    function add(){
        $sql = "INSERT INTO patient (staffID, pFName, pLName, patientType, bloodType, birthdate, address, contactNo, civilStatus, nationality, sex, occupation) VALUES 
        (:staffID, :pFName, :pLName, :patientType, :bloodType, :birthdate, :address, :contactNo, :civilStatus, :nationality, :sex, :occupation);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':staffID',$this->staffID);
        $query->bindParam(':pFName', $this->pFName);
        $query->bindParam(':pLName', $this->pLName);
        $query->bindParam(':patientType', $this->patientType);
        $query->bindParam(':bloodType', $this->bloodType);
        $query->bindParam(':birthdate', $this->birthdate);
        $query->bindParam(':address', $this->address);
        $query->bindParam(':contactNo', $this->contactNo);
        $query->bindParam(':civilStatus', $this->civilStatus);
        $query->bindParam(':nationality', $this->nationality);
        $query->bindParam(':sex', $this->sex);
        $query->bindParam(':occupation', $this->occupation);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function edit(){
        $sql = "UPDATE patient SET pFName=:pFName, pLName=:pLName, patientType=:patientType, bloodType=:bloodType, birthdate=:birthdate, address=:address, contactNo=:contactNo, civilStatus=:civilStatus, nationality=:nationality, sex=:sex, occupation=:occupation WHERE patientID = :id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':pFName', $this->pFName);
        $query->bindParam(':pLName', $this->pLName);
        $query->bindParam(':patientType', $this->patientType);
        $query->bindParam(':bloodType', $this->bloodType);
        $query->bindParam(':birthdate', $this->birthdate);
        $query->bindParam(':address', $this->address);
        $query->bindParam(':contactNo', $this->contactNo);
        $query->bindParam(':civilStatus', $this->civilStatus);
        $query->bindParam(':nationality', $this->nationality);
        $query->bindParam(':sex', $this->sex);
        $query->bindParam(':occupation', $this->occupation);
        $query->bindParam(':id', $this->id);

        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function fetch($record_id){
        $sql = "SELECT * FROM patient WHERE patientID = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function show(){
        $sql = "SELECT * FROM patient;";
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