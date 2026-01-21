<?php
require_once("m_dbConnect.php");



function getTutorData($user_id) {
    $conn = dbConnect();
    
    $sql = "SELECT u.username, u.email, t.* FROM users u 
            JOIN tutor_profiles t ON u.id = t.user_id 
            WHERE u.id = '$user_id'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

function getAdminData($user_id) {
    $conn = dbConnect();
    $sql = "SELECT * FROM users WHERE id = '$user_id'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}



function updateTutorProfile($user_id, $email, $edu, $inst, $exp, $sub, $bio) {
    $conn = dbConnect();
    
    
    $sql1 = "UPDATE users SET email='$email' WHERE id='$user_id'";
    mysqli_query($conn, $sql1);

    
    $sql2 = "UPDATE tutor_profiles SET 
             education_background='$edu', 
             institution='$inst', 
             experience='$exp', 
             subjects='$sub', 
             short_bio='$bio' 
             WHERE user_id='$user_id'";
             
    return mysqli_query($conn, $sql2);
}

function updateAdminProfile($user_id, $email) {
    $conn = dbConnect();
    $sql = "UPDATE users SET email='$email' WHERE id='$user_id'";
    return mysqli_query($conn, $sql);
}



function deleteAccount($user_id) {
    $conn = dbConnect();
    
    $sql = "DELETE FROM users WHERE id='$user_id'";
    return mysqli_query($conn, $sql);
}
?>