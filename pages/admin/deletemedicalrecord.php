<?php
    // including the database connection file
    require_once('../../classes/database.php');

    $db = new Database();
    $id = $_GET['id'];
    // deleting the row from table
    $sql = "DELETE FROM medical_record WHERE consultationID=?";
    $stmt= $db->connect()->prepare($sql);
    $stmt->execute([$id]);

    // redirecting to the display page (index.php in our case)
    header('location: medical-record.php');
?>