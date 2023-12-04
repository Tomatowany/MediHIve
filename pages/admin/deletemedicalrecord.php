<?php
    // including the database connection file
    require_once('../../classes/database.php');
    
    // getting id of the data from url
    $id = $_GET['id'];

    $db = new Database();
    // Assuming your Database class has a method to get the mysqli connection
    $dbc = $db->getConnection();

    // Check if the connection is successful
    if (!$dbc) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Use $dbc in your query
    mysqli_query($dbc, "DELETE FROM medical_record WHERE consultationID='$id'");
    
    // close the database connection
    mysqli_close($dbc);

    // redirecting to the display page (index.php in our case)
    header('location: medical-record.php');
?>