<?php
    // including the database connection file
    require_once('../../classes/database.php');
    // getting id of the data from url
    $db = new Database();
    $id = $_GET['id'];
    // deleting the row from table
    $sql = "DELETE FROM casetbl WHERE caseID=?";
    $stmt= $db->connect()->prepare($sql);
    $stmt->execute([$id]);

    // redirecting to the display page (index.php in our case)
    header('location: case.php');
?>