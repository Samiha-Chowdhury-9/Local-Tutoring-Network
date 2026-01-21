<?php

session_start();
require_once("../Model/m_session.php");


if (!isset($_SESSION['role']) || $_SESSION['role'] != 'tutor') {
    header("Location: ../View/v_login.php");
    exit();
}


if (isset($_POST['add_slot'])) {
    $tutor_id = $_SESSION['user_id'];
    $date = $_POST['date'];
    $time = $_POST['time_slot'];

    if (empty($date) || empty($time)) {
        header("Location: ../View/vw_tutor/v_manage_schedule.php?err=Date and Time required");
        exit();
    }

    $result = addSessionSlot($tutor_id, $date, $time);

    if ($result === true) {
        header("Location: ../View/vw_tutor/v_manage_schedule.php?msg=Slot Added Successfully");
    } else {
        header("Location: ../View/vw_tutor/v_manage_schedule.php?err=" . urlencode($result));
    }
}


if (isset($_POST['delete_slot'])) {
    $slot_id = $_POST['slot_id'];
    if(deleteSessionSlot($slot_id)) {
        header("Location: ../View/vw_tutor/v_manage_schedule.php?msg=Slot Deleted");
    } else {
        header("Location: ../View/vw_tutor/v_manage_schedule.php?err=Delete Failed");
    }
}
?>