<?php
session_start();
require_once("../Model/m_profiles.php");


if (isset($_POST['update_tutor'])) {
    $id = $_SESSION['user_id'];
    $email = $_POST['email'];
    $edu = $_POST['education_background'];
    $inst = $_POST['institution'];
    $exp = $_POST['experience'];
    $bio = $_POST['short_bio'];
    $rate = $_POST['hourly_rate']; 

    
    if (isset($_POST['subjects'])) {
        $sub = implode(", ", $_POST['subjects']); 
    } else {
        $sub = ""; 
    }

    if(updateTutorProfile($id, $email, $edu, $inst, $exp, $sub, $bio, $rate)) {
        header("Location: ../View/vw_tutor/v_tutor_profile.php?success=Profile Updated");
    } else {
        header("Location: ../View/vw_tutor/v_tutor_edit_profile.php?error=Update Failed");
    }
}


if (isset($_POST['update_admin'])) {
    $id = $_SESSION['user_id'];
    $email = $_POST['email'];

    if(updateAdminProfile($id, $email)) {
        header("Location: ../View/vw_admin/v_admin_profile.php?success=Profile Updated");
    } else {
        header("Location: ../View/vw_admin/v_admin_edit_profile.php?error=Update Failed");
    }
}


if (isset($_POST['update_student'])) {
    $id = $_SESSION['user_id'];
    $email = $_POST['email'];
    $edu = $_POST['education_background'];
    $inst = $_POST['institution'];
    $loc = $_POST['location'];

    if(updateStudentProfile($id, $email, $edu, $inst, $loc)) {
        header("Location: ../View/vw_student-guardian/v_student-guardian_profile.php?success=Profile Updated");
    } else {
        header("Location: ../View/vw_student-guardian/v_student-guardian_edit_profile.php?error=Update Failed");
    }
}


if (isset($_POST['delete_account'])) {
    $id = $_SESSION['user_id'];
    if(deleteAccount($id)) {
        session_destroy();
        header("Location: ../View/v_home.php?msg=Account Deleted");
    } else {
        header("Location: ../View/v_login.php?error=Delete Failed");
    }
}
?>