<?php
require_once("../Model/m_dbConnect.php");

function getStudentInfo($id) {
    $conn = dbConnect();
    $sql = "SELECT u.username, u.email, u.phone_number, sp.address, sp.institution, sp.dob 
            FROM users u 
            LEFT JOIN student_profiles sp ON u.id = sp.user_id 
            WHERE u.id = '$id'";
            
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

function updateStudentInfo($id, $phone, $address, $institution, $dob) {
    $conn = dbConnect();
    
    $sqlUser = "UPDATE users SET phone_number = '$phone' WHERE id = '$id'";
    mysqli_query($conn, $sqlUser);

    $check = mysqli_query($conn, "SELECT * FROM student_profiles WHERE user_id = '$id'");
    
    if (mysqli_num_rows($check) > 0) {
        $sqlProfile = "UPDATE student_profiles SET address = '$address', institution = '$institution', dob = '$dob' WHERE user_id = '$id'";
    } else {
        $sqlProfile = "INSERT INTO student_profiles (user_id, address, institution, dob) VALUES ('$id', '$address', '$institution', '$dob')";
    }
    
    return mysqli_query($conn, $sqlProfile);
}
?>