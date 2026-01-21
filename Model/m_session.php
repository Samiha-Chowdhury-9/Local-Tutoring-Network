<?php

require_once("m_dbConnect.php");


function addSessionSlot($tutor_id, $date, $time) {
    $conn = dbConnect();
    
  
    $check = mysqli_query($conn, "SELECT id FROM session_schedules WHERE tutor_id='$tutor_id' AND date='$date' AND time_slot='$time'");
    
    if(mysqli_num_rows($check) > 0) return "Slot already exists";

    $sql = "INSERT INTO session_schedules (tutor_id, date, time_slot, status) VALUES ('$tutor_id', '$date', '$time', 'available')";
    
    if(mysqli_query($conn, $sql)) return true;
    return "Error: " . mysqli_error($conn);
}


function getTutorSlots($tutor_id) {
    $conn = dbConnect();
    $sql = "SELECT * FROM session_schedules WHERE tutor_id='$tutor_id' ORDER BY date, time_slot ASC";
    $result = mysqli_query($conn, $sql);
    
    $slots = [];
    if ($result) {
        while($row = mysqli_fetch_assoc($result)) {
            $slots[] = $row;
        }
    }
    return $slots;
}


function deleteSessionSlot($slot_id) {
    $conn = dbConnect();
    $sql = "DELETE FROM session_schedules WHERE id='$slot_id' AND status='available'";
    return mysqli_query($conn, $sql);
}
?>