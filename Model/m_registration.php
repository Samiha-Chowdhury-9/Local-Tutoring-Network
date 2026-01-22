<?php
require_once("m_dbConnect.php");

function registerStudent($username, $pass, $email, $edu, $inst, $loc) {
    $conn = dbConnect();
    
    $check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if(mysqli_num_rows($check) > 0) return "Username taken";

    $enc_pass = md5($pass);

    $sql1 = "INSERT INTO users (username, password, email, role) VALUES ('$username', '$enc_pass', '$email', 'student-guardian')";
    if(mysqli_query($conn, $sql1)){
        $uid = mysqli_insert_id($conn);
        
        $sql2 = "INSERT INTO student_profiles (user_id, education_background, institution, location) VALUES ('$uid', '$edu', '$inst', '$loc')";
        if(mysqli_query($conn, $sql2)) return true;
    }
    return "Error: " . mysqli_error($conn);
}


function registerTutor($username, $pass, $email, $edu, $inst, $exp, $sub, $bio, $rate) {
    $conn = dbConnect();
    
    $check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if(mysqli_num_rows($check) > 0) return "Username taken";

    $enc_pass = md5($pass);

    $sql1 = "INSERT INTO users (username, password, email, role, status) 
             VALUES ('$username', '$enc_pass', '$email', 'tutor', 'pending')";
             
    if(mysqli_query($conn, $sql1)){
        $uid = mysqli_insert_id($conn);
        
        $sql2 = "INSERT INTO tutor_profiles (user_id, education_background, institution, experience, subjects, short_bio, hourly_rate) 
                 VALUES ('$uid', '$edu', '$inst', '$exp', '$sub', '$bio', '$rate')";
        if(mysqli_query($conn, $sql2)) return true;
    }
    return "Error: " . mysqli_error($conn);
}

function isEmailTaken($email) {
    $conn = dbConnect();
    $safeEmail = mysqli_real_escape_string($conn, $email);
    $query = "SELECT id FROM users WHERE email='$safeEmail'";
    $result = mysqli_query($conn, $query);
    return mysqli_num_rows($result) > 0;
}
?>