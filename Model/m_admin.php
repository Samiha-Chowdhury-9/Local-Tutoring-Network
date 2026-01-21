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



function getAllSubjects() {
    $conn = dbConnect();
    $sql = "SELECT * FROM subjects ORDER BY subject_name ASC";
    $result = mysqli_query($conn, $sql);
    
    $subjects = [];
    while($row = mysqli_fetch_assoc($result)) {
        $subjects[] = $row;
    }
    return $subjects;
}

function addSubject($name) {
    $conn = dbConnect();
    $safeName = mysqli_real_escape_string($conn, $name);
    
    
    $check = mysqli_query($conn, "SELECT id FROM subjects WHERE subject_name = '$safeName'");
    if(mysqli_num_rows($check) > 0) return false; 

    $sql = "INSERT INTO subjects (subject_name) VALUES ('$safeName')";
    return mysqli_query($conn, $sql);
}

function deleteSubject($id) {
    $conn = dbConnect();
    $sql = "DELETE FROM subjects WHERE id = '$id'";
    return mysqli_query($conn, $sql);
}
?>
?>