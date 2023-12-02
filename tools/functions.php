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

    function function_alert($message) {   
        // Display the alert box 
        echo "<script>alert('$message');</script>";
    
    }

    function validate_field($field){
        $field = htmlentities($field);
        if(strlen(trim($field))<1){
            return false;
        }else{
            return true;
        }
    }

    function validate_email($email){
        // Check if the 'email' key exists in the $_POST array
        if (isset($email)) {
            $email = trim($email); // Trim whitespace
            // Check if the email is not empty
            if (empty($email)) {
                return 'Email is required';
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Check if the email has a valid format
                return 'Email is invalid format';
            } else {
                return 'success';
            }
        } else {
            return 'Email is required'; // 'email' key doesn't exist in $_POST
        }
    } 

    function validate_password($password) {
        $password = htmlentities($password);
        
        if (strlen(trim($password)) < 1) {
            return "Password cannot be empty";
        } elseif (strlen($password) < 8) {
            return "Password must be at least 8 characters long";
        } else {
            return "success"; // Indicates successful validation
        }
    } 
    
    function validate_cpw($password, $cpassword){
        $pw = htmlentities($password);
        $cpw = htmlentities($cpassword);
        if(strcmp($pw, $cpw) == 0){
            return true;
        }else{
            return false;
        }
    }
?>