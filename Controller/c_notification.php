<?php
session_start();
require_once("../Model/m_notification.php");

if (isset($_POST['send_broadcast'])) {
    if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
        exit("Access Denied");
    }


    if (isset($_POST['delete_notification'])) {
        if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
            exit("Access Denied");
        }

    $id = $_POST['notification_id'];
    
    if(deleteNotification($id)) {
        header("Location: ../View/vw_admin/v_send_notification.php?msg=Notification Deleted");
    } else {
        header("Location: ../View/vw_admin/v_send_notification.php?err=Delete Failed");
    }
}

    $message = $_POST['message'];
    
    if(!empty($message)) {
        if(addNotification($message)) {
            header("Location: ../View/vw_admin/v_send_notification.php?msg=Broadcast Sent");
        } else {
            header("Location: ../View/vw_admin/v_send_notification.php?err=Failed to send");
        }
    } else {
        header("Location: ../View/vw_admin/v_send_notification.php?err=Message cannot be empty");
    }
}
?>