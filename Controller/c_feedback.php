<?php
session_start();
require_once("../Model/m_feedback.php");

if (isset($_POST['submit_review'])) {
    if (!isset($_SESSION['role']) || $_SESSION['role'] != 'student-guardian') {
        exit("Access Denied");
    }

    $tutor_id = $_POST['tutor_id'];
    $student_id = $_SESSION['user_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    if(addReview($tutor_id, $student_id, $rating, $comment)) {
        header("Location: ../View/vw_student-guardian/v_my_bookings.php?msg=Review Submitted");
    } else {
        header("Location: ../View/vw_student-guardian/v_my_bookings.php?err=Failed to submit review");
    }
}
?>