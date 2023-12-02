<?php

require_once 'database.php';

class Overview
{
    //attributes

    public $id;
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

    function fetch($record_id)
    {
        $sql = "SELECT patientID FROM medical_record p INNER JOIN staff s ON p.staffID = s.staffID;";
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if ($query->execute()) {
            $data = $query->fetch();
        }
        return $data;
    }

    function show()
    {
        $sql = "SELECT patientID FROM medical_record p INNER JOIN staff s ON p.staffID = s.staffID;";
        $query = $this->db->connect()->prepare($sql);
        $data = null;
        if ($query->execute()) {
            $data = $query->fetchAll();
        }
        return $data;
    }
}
?>