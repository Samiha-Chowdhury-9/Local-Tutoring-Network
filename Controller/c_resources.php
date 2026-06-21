<?php
session_start();
require_once("../Model/m_resources.php");

// 1. Logic for Uploading Resources
if (isset($_POST['upload_resource'])) {
    if (!isset($_SESSION['role']) || $_SESSION['role'] != 'tutor') {
        exit("Access Denied");
    }

    $tutor_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $subject = $_POST['subject']; // Captured the subject from your form
    
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileError = $_FILES['file']['error'];

    if ($fileError === 0) {
        $fileNewName = uniqid('', true) . "_" . $fileName;
        $fileDestination = '../uploads/' . $fileNewName;

        // Move the file to the uploads folder
        if (move_uploaded_file($fileTmpName, $fileDestination)) {
            // Ensure this function in m_resources.php accepts these 4 parameters
            if (uploadResource($tutor_id, $title, $subject, $fileNewName)) {
                header("Location: ../View/vw_tutor/v_upload_resource.php?msg=Upload Success");
                exit();
            } else {
                header("Location: ../View/vw_tutor/v_upload_resource.php?err=Database Error");
                exit();
            }
        } else {
            header("Location: ../View/vw_tutor/v_upload_resource.php?err=Failed to move file");
            exit();
        }
    } else {
        header("Location: ../View/vw_tutor/v_upload_resource.php?err=File Error");
        exit();
    }
}

// 2. Logic for Deleting Resources
if (isset($_POST['delete_file'])) {
    if (!isset($_SESSION['role']) || $_SESSION['role'] != 'tutor') {
        exit("Access Denied");
    }

    $id = $_POST['resource_id'];
    
    $deletedFile = deleteResource($id);
    if ($deletedFile) {
        // Unlink the file from the server folder
        if (file_exists("../uploads/" . $deletedFile)) {
            unlink("../uploads/" . $deletedFile);
        }
        header("Location: ../View/vw_tutor/v_upload_resource.php?msg=Deleted");
        exit();
    } else {
        header("Location: ../View/vw_tutor/v_upload_resource.php?err=Delete Failed");
        exit();
    }
}
?>