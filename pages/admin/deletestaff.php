<?php
    // including the database connection file
    require_once('../../classes/database.php');
    // getting id of the data from url
    $id = $_GET['id'];
    // deleting the row from table
    mysqli_query($dbc, "DELETE FROM staff WHERE staffID='$id'");
    // redirecting to the display page (index.php in our case)
    header('location: staff.php');
?>