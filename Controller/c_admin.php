<?php
session_start();
require_once("../Model/m_admin.php");


if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../View/v_login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    if (isset($_POST['approve_user'])) {
        $id = $_POST['user_id'];
        if (updateUserStatus($id, 'active')) {
            header("Location: ../View/vw_admin/v_manage_tutors.php?msg=User Approved Successfully");
        } else {
            header("Location: ../View/vw_admin/v_manage_tutors.php?err=Approval Failed");
        }
    }

   
    if (isset($_POST['reject_user'])) {
        $id = $_POST['user_id'];
        
        if (updateUserStatus($id, 'rejected')) {
            header("Location: ../View/vw_admin/v_manage_tutors.php?msg=User Rejected");
        } else {
            header("Location: ../View/vw_admin/v_manage_tutors.php?err=Rejection Failed");
        }
    }
}
?>