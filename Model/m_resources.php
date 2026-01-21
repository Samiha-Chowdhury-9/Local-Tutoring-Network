<?php
require_once("m_dbConnect.php");

function uploadResource($tutor_id, $title, $fileName) {
    $conn = dbConnect();
    $sql = "INSERT INTO resources (tutor_id, title, file_name) VALUES ('$tutor_id', '$title', '$fileName')";
    return mysqli_query($conn, $sql);
}

function getTutorResources($tutor_id) {
    $conn = dbConnect();
    $sql = "SELECT * FROM resources WHERE tutor_id='$tutor_id' ORDER BY upload_date DESC";
    $result = mysqli_query($conn, $sql);
    
    $files = [];
    while($row = mysqli_fetch_assoc($result)) {
        $files[] = $row;
    }
    return $files;
}


function getAllResources() {
    $conn = dbConnect();
    $sql = "SELECT r.*, u.username as tutor_name 
            FROM resources r 
            JOIN users u ON r.tutor_id = u.id 
            ORDER BY r.upload_date DESC";
    $result = mysqli_query($conn, $sql);
    
    $files = [];
    while($row = mysqli_fetch_assoc($result)) {
        $files[] = $row;
    }
    return $files;
}

function deleteResource($id) {
    $conn = dbConnect();
    $res = mysqli_query($conn, "SELECT file_name FROM resources WHERE id='$id'");
    $row = mysqli_fetch_assoc($res);
    $fileToDelete = $row['file_name'];

    if (mysqli_query($conn, "DELETE FROM resources WHERE id='$id'")) {
        return $fileToDelete; 
    }
    return false;
}
?>