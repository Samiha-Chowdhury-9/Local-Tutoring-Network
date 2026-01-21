<?php
require_once("../Model/m_dbConnect.php");

function getStudentInfo($id) {
    $conn = dbConnect();
    
    
    $sql = "SELECT u.username, u.email, sp.education_background, sp.institution, sp.location 
            FROM users u 
            LEFT JOIN student_profiles sp ON u.id = sp.user_id 
            WHERE u.id = '$id'";
            
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

function updateStudentInfo($id, $email, $edu, $inst, $loc) {
    $conn = dbConnect();

    
    $sqlUser = "UPDATE users SET email = '$email' WHERE id = '$id'";
    mysqli_query($conn, $sqlUser);

    
    $check = mysqli_query($conn, "SELECT * FROM student_profiles WHERE user_id = '$id'");
    
    if (mysqli_num_rows($check) > 0) {
        $sqlProfile = "UPDATE student_profiles SET education_background = '$edu', institution = '$inst', location = '$loc' WHERE user_id = '$id'";
    } else {
        $sqlProfile = "INSERT INTO student_profiles (user_id, education_background, institution, location) VALUES ('$id', '$edu', '$inst', '$loc')";
    }
    
    return mysqli_query($conn, $sqlProfile);
}
?>