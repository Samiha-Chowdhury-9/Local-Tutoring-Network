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


    if (isset($_POST['add_subject'])) {
        $name = trim($_POST['subject_name']);
        
        if (!empty($name)) {
            if (addSubject($name)) {
                header("Location: ../View/vw_admin/v_manage_subjects.php?msg=Subject Added");
            } else {
                header("Location: ../View/vw_admin/v_manage_subjects.php?err=Subject Already Exists");
            }
        } else {
            header("Location: ../View/vw_admin/v_manage_subjects.php?err=Name Cannot be Empty");
        }
    }

 
    if (isset($_POST['delete_subject'])) {
        $id = $_POST['subject_id'];
        
        if (deleteSubject($id)) {
            header("Location: ../View/vw_admin/v_manage_subjects.php?msg=Subject Deleted");
        } else {
            header("Location: ../View/vw_admin/v_manage_subjects.php?err=Delete Failed");
        }
    }
?>