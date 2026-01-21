<?php
require_once("../Model/m_registration.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_POST['email'];

    
    if ($password !== $confirm_password) {
        $errorMsg = "Passwords do not match!";
        if (isset($_POST['reg_student'])) {
            header("Location: ../View/v_register_student.php?error=" . urlencode($errorMsg));
        } else {
            header("Location: ../View/v_register_tutor.php?error=" . urlencode($errorMsg));
        }
        exit();
    }

    
    if (isset($_POST['reg_student'])) {
        $edu = $_POST['education_background'];
        $inst = $_POST['institution'];
        $loc = $_POST['location'];

        if (empty($username) || empty($password) || empty($email) || empty($edu) || empty($inst) || empty($loc)) {
            header("Location: ../View/v_register_student.php?error=All fields required");
            exit();
        }

        $result = registerStudent($username, $password, $email, $edu, $inst, $loc);

        if ($result === true) {
            header("Location: ../View/v_login.php?success=Student Account Created");
        } else {
            header("Location: ../View/v_register_student.php?error=" . urlencode($result));
        }

    
    } elseif (isset($_POST['reg_tutor'])) {
        $edu = $_POST['education_background'];
        $inst = $_POST['institution'];
        $exp = $_POST['experience'];
        $sub = $_POST['subjects'];
        $bio = $_POST['short_bio'];

        if (empty($username) || empty($password) || empty($email) || empty($edu) || empty($inst) || empty($exp) || empty($sub)) {
            header("Location: ../View/v_register_tutor.php?error=All fields required");
            exit();
        }

        $result = registerTutor($username, $password, $email, $edu, $inst, $exp, $sub, $bio);

        if ($result === true) {
            header("Location: ../View/v_login.php?success=Tutor Account Created");
        } else {
            header("Location: ../View/v_register_tutor.php?error=" . urlencode($result));
        }
    }
}
?>