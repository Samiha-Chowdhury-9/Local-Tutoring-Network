<?php
require_once("../Model/m_dbConnect.php");

function bookSession($student_id, $tutor_id, $subject, $time) {
    $conn = dbConnect();
    $sql = "INSERT INTO bookings (student_id, tutor_id, subject, session_time, status) 
            VALUES ('$student_id', '$tutor_id', '$subject', '$time', 'pending')";
    
    if(mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}
?>