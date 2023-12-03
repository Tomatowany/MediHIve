<?php

require_once 'database.php';

Class Staff{
    //attributes

    public $id;
    public $firstName;
    public $lastName;
    public $contact;
    public $password;
    public $address;
    public $email;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods

    function add(){
        $sql = "INSERT INTO staff (firstName, lastName, contact, password, address, email) VALUES 
        (:firstName, :lastName, :contact, :password, :address, :email);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':firstName', $this->firstName);
        $query->bindParam(':lastName', $this->lastName);
        $query->bindParam(':contact', $this->contact);
        $query->bindParam(':password', $this->password);
        $query->bindParam(':address', $this->address);
        $query->bindParam(':email', $this->email);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function edit(){
        $sql = "UPDATE staff SET firstName=:firstName, lastName=:lastName, contact=:contact, password=:password, address=:address, email=:email WHERE staffID = :id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':firstName', $this->firstName);
        $query->bindParam(':lastName', $this->lastName);
        $query->bindParam(':contact', $this->contact);
        $query->bindParam(':password', $this->password);
        $query->bindParam(':address', $this->address);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':id', $this->id);

        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function fetch($record_id){
        $sql = "SELECT * FROM staff WHERE staffID = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function show(){
        $sql = "SELECT * FROM staff;";
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