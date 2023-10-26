<?php

    function validate_fn($POST){
        if(strlen(trim($POST['fullName']))<1){
            return false;
        }else{
            return true;
        }
    }

    function validate_c($POST){
        if(strlen(trim($POST['contact']))<1){
            return false;
        }else{
            return true;
        }
    }

    function validate_hc($POST){
        if(strlen(trim($POST['hospCode']))<1){
            return false;
        }else{
            return true;
        }
    }

    function validate_cp($POST){
        $p = htmlentities($POST['password']);
        $cp = htmlentities($POST['confirmPassword']);
        if(strcmp($p, $cp) == 0){
            return true;
        }else{
            return false;
        }
    }

?>

<?php
    if(isset($_POST['signup'])){
       $fullname = $_POST['fullName'];
       $gender = $_POST['gender'];
       $contact = $_POST['contact'];
       $email = $_POST['email'];
       $hospCode = $_POST['hospCode'];
       $password = $_POST['password'];
       $confirmPassword = $_POST['confirmPassword'];

       $error_list = array();

       if (empty($fullname)){
        $error_list[] = 'Your name is required.';
       }
       if (empty($gender)){
        $error_list[] = 'Please select your gender.';
       }
       if (empty($contact)){
        $error_list[] = 'Contact should not be empty.';
       }
       if (empty($email)){
        $error_list[] = 'Email should not be empty.';
       }
       if (empty($hospCode)){
        $error_list[] = 'Your hospital code is required.';
       }
       if (strlen($password)< 3){
        $error_list[] = 'Minimum of 3 characters.';
       }
       if (empty($password)){
        $error_list[] = 'Password is required.';
       }
       if (empty($confirmPassword)){
        $error_list[] = 'Please enter password again to confirm.';
       }
       if ($password !=$confirmPassword){
        $error_list[] = 'Passwords do not match.';
       }

       if (isset($_POST['signup'])){
        $fullname = $_POST['fullName'];
        if (count($error_list) == 0){
            function_alert("Please wait for admin confirmation");
            exit();
            
        } else {

            foreach ($error_list as $error_list){
                function_alert($error_list); 
            }
         }
       }
    }
?>

<?php
    function function_alert($message) {   
        // Display the alert box 
        echo "<script>alert('$message');</script>";
    
    } 
?>