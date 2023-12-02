<?php

require_once('../../classes/database.php');

class Account{

    public $id;
    public $email;
    public $password;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    function sign_in_staff(){
        $sql = "SELECT * FROM staff WHERE email = :email LIMIT 1;";
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':email', $this->email);
    
        if ($query->execute()) {
            $accountData = $query->fetch(PDO::FETCH_ASSOC);
            if ($accountData && $this->password == $accountData['password']) {
                $this->id = $accountData['id'];
                return $accountData;
            }
        }
        return false;
    }

    function sign_in_patient(){
        $sql = "SELECT * FROM patient WHERE patientID = :id LIMIT 1;";
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':id', $this->id);
    
        if ($query->execute()) {
            $accountData = $query->fetch(PDO::FETCH_ASSOC);
            if ($accountData && $this->email == $accountData['email']) {
                $this->id = $accountData['email'];
                return $accountData;
            }
        }
    
        return false;
    } 

}

?>