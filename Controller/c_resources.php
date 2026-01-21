<?php
session_start();
require_once("../Model/m_resources.php");

if (isset($_POST['upload_file'])) {
    if ($_SESSION['role'] != 'tutor') exit("Access Denied");

    $tutor_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileError = $_FILES['file']['error'];

    if ($fileError === 0) {
        $fileNewName = uniqid('', true) . "_" . $fileName;
        $fileDestination = '../uploads/' . $fileNewName;

        if (move_uploaded_file($fileTmpName, $fileDestination)) {
            if (uploadResource($tutor_id, $title, $fileNewName)) {
                header("Location: ../View/vw_tutor/v_upload_resource.php?msg=Upload Success");
            } else {
                header("Location: ../View/vw_tutor/v_upload_resource.php?err=Database Error");
            }
        } else {
            header("Location: ../View/vw_tutor/v_upload_resource.php?err=Failed to move file");
        }
    } else {
        header("Location: ../View/vw_tutor/v_upload_resource.php?err=File Error");
    }
}

if (isset($_POST['delete_file'])) {
    $id = $_POST['resource_id'];
    
    $deletedFile = deleteResource($id);
    if ($deletedFile) {
        unlink("../uploads/" . $deletedFile);
        header("Location: ../View/vw_tutor/v_upload_resource.php?msg=Deleted");
    } else {
        header("Location: ../View/vw_tutor/v_upload_resource.php?err=Delete Failed");
    }
}
?>