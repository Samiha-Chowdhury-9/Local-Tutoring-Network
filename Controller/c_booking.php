<?php
session_start();
require_once("../Model/m_booking.php");


if (!isset($_SESSION['role']) || $_SESSION['role'] != 'student-guardian') {
    header("Location: ../View/v_login.php");
    exit();
}

if (isset($_POST['book_slot'])) {
    $slot_id = $_POST['slot_id'];
    $tutor_id = $_POST['tutor_id']; 
    $student_id = $_SESSION['user_id'];

    if(bookSlot($slot_id, $student_id)) {
        header("Location: ../View/vw_student-guardian/v_my_bookings.php?msg=Booking Confirmed");
    } else {
        header("Location: ../View/vw_student-guardian/v_book_tsession.php?tutor_id=$tutor_id&err=Booking Failed or Slot Taken");
    }
}
?>