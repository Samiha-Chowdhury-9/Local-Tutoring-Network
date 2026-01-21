<?php
require_once("m_dbConnect.php");

function getPendingTutors() {
    $conn = dbConnect();
    
    $sql = "SELECT u.id, u.username, u.email, t.education_background, t.subjects 
            FROM users u 
            JOIN tutor_profiles t ON u.id = t.user_id 
            WHERE u.role = 'tutor' AND u.status = 'pending'";
            
    $result = mysqli_query($conn, $sql);
    
    $tutors = [];
    while($row = mysqli_fetch_assoc($result)) {
        $tutors[] = $row;
    }
    return $tutors;
}

function updateUserStatus($user_id, $status) {
    $conn = dbConnect();
    $sql = "UPDATE users SET status = '$status' WHERE id = '$user_id'";
    return mysqli_query($conn, $sql);
}
?>