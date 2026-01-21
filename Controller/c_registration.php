<?php
session_start();
require_once("../Model/m_registration.php");

function clean($data) {
        $data = trim($data);            
        $data = stripslashes($data);    
        $data = htmlspecialchars($data);
        return $data;
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    $username = clean($_POST['username']);
    $email    = clean($_POST['email']);
    $password = $_POST['password']; 
    $confirm  = $_POST['confirm_password'];

   
    $queryString = ""; 

 

   
    if (empty($username)) {
        $queryString .= "&usernameErr=" . urlencode("Username is required");
    }

    
    if (empty($email)) {
        $queryString .= "&emailErr=" . urlencode("Email is required");
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $queryString .= "&emailErr=" . urlencode("Invalid email format");
    }
    elseif (isEmailTaken($email)) {
        $queryString .= "&emailErr=" . urlencode("Email already registered");
    }

   
    if (empty($password)) {
        $queryString .= "&passErr=" . urlencode("Password is required");
    }
    elseif (strlen($password) < 4) {
        $queryString .= "&passErr=" . urlencode("Password too short (min 4)");
    }

  
    if ($password !== $confirm) {
        $queryString .= "&confirmErr=" . urlencode("Passwords do not match");
    }

 

    if (isset($_POST['reg_student'])) {
        $edu = clean($_POST['education_background']);
        $inst = clean($_POST['institution']);
        $loc = clean($_POST['location']);

        if(empty($edu))  $queryString .= "&eduErr=" . urlencode("Required");
        if(empty($inst)) $queryString .= "&instErr=" . urlencode("Required");
        if(empty($loc))  $queryString .= "&locErr=" . urlencode("Required");

} elseif (isset($_POST['reg_tutor'])) {
        $edu = clean($_POST['education_background']);
        $inst = clean($_POST['institution']);
        $exp = clean($_POST['experience']);
        $bio = clean($_POST['short_bio']);
        $rate = clean($_POST['hourly_rate']); 

        
        if (isset($_POST['subjects'])) {
            $sub = implode(", ", $_POST['subjects']); 
        } else {
            $sub = "";
        }

      
        if(empty($edu))  $queryString .= "&eduErr=" . urlencode("Required");
        if(empty($inst)) $queryString .= "&instErr=" . urlencode("Required");
        if(empty($exp))  $queryString .= "&expErr=" . urlencode("Required");
        if(empty($sub))  $queryString .= "&subErr=" . urlencode("Required");
        if(empty($rate)) $queryString .= "&rateErr=" . urlencode("Required");

        if ($queryString != "") {
             header("Location: ../View/v_register_tutor.php?" . $queryString);
             exit();
        }

       
        $result = registerTutor($username, $password, $email, $edu, $inst, $exp, $sub, $bio, $rate);
        
        if ($result === true) {
            header("Location: ../View/v_login.php?success=Account Pending Approval");
        } else {
            header("Location: ../View/v_register_tutor.php?globalErr=" . urlencode($result));
        }
    }

        if(empty($edu))  $queryString .= "&eduErr=" . urlencode("Required");
        if(empty($inst)) $queryString .= "&instErr=" . urlencode("Required");
        if(empty($exp))  $queryString .= "&expErr=" . urlencode("Required");
        if(empty($sub))  $queryString .= "&subErr=" . urlencode("Required");
    }

   

    if ($queryString != "") {
       
        $url = isset($_POST['reg_student']) ? "../View/v_register_student.php" : "../View/v_register_tutor.php";
       
        header("Location: $url?" . $queryString);
        exit();
    } 
    else {
    
        if (isset($_POST['reg_student'])) {
            $result = registerStudent($username, $password, $email, $edu, $inst, $loc);
            
            if ($result === true) {
                header("Location: ../View/v_login.php?success=Student Account Created");
            } else {
                header("Location: ../View/v_register_student.php?globalErr=" . urlencode($result));
            }

        } 
    }

?>