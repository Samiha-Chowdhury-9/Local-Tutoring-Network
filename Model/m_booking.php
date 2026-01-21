<?php
require_once("m_dbConnect.php");

function getAvailableSlots($tutor_id) {
    $conn = dbConnect();
    $sql = "SELECT * FROM session_schedules 
            WHERE tutor_id='$tutor_id' AND status='available' 
            ORDER BY date, time_slot ASC";
    $result = mysqli_query($conn, $sql);
    
    $slots = [];
    while($row = mysqli_fetch_assoc($result)) {
        $slots[] = $row;
    }
    return $slots;
}

function bookSlot($slot_id, $student_id) {
    $conn = dbConnect();
    $sql = "UPDATE session_schedules 
            SET status='booked', student_id='$student_id' 
            WHERE id='$slot_id' AND status='available'";
            
    if(mysqli_query($conn, $sql)) {
        return mysqli_affected_rows($conn) > 0; 
    }
    return false;
}

function getStudentBookings($student_id) {
    $conn = dbConnect();
    $sql = "SELECT s.*, u.username as tutor_name, u.email as tutor_email 
            FROM session_schedules s
            JOIN users u ON s.tutor_id = u.id
            WHERE s.student_id='$student_id'
            ORDER BY s.date DESC";
    $result = mysqli_query($conn, $sql);
    
    $bookings = [];
    while($row = mysqli_fetch_assoc($result)) {
        $bookings[] = $row;
    }
    return $bookings;
}
?>