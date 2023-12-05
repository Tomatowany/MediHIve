<?php
    // including the database connection file
    require_once('../../classes/database.php');
    // getting id of the data from url
    $db = new Database();
    $id = $_GET['id'];
    // deleting the row from table
    $sql = "DELETE FROM patient WHERE patientID=?";
    $stmt= $db->connect()->prepare($sql);
    $stmt->execute([$id]);
    //mysqli_query($dbc, "DELETE FROM patient WHERE patientID='$id'");
    // redirecting to the display page (index.php in our case)
    header('location: patient.php');
?>