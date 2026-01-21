<?php
require_once("m_dbConnect.php");

function addNotification($message) {
    $conn = dbConnect();
    $safeMsg = mysqli_real_escape_string($conn, $message);
    $sql = "INSERT INTO notifications (message) VALUES ('$safeMsg')";
    return mysqli_query($conn, $sql);
}

function getLatestNotification() {
    $conn = dbConnect();
    $sql = "SELECT * FROM notifications ORDER BY created_at DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
    
    if($row = mysqli_fetch_assoc($result)) {
        return $row;
    }
    return null;
}

function getAllNotifications() {
    $conn = dbConnect();
    $sql = "SELECT * FROM notifications ORDER BY created_at DESC";
    $result = mysqli_query($conn, $sql);
    
    $list = [];
    while($row = mysqli_fetch_assoc($result)) {
        $list[] = $row;
    }
    return $list;
}


function deleteNotification($id) {
    $conn = dbConnect();
    $sql = "DELETE FROM notifications WHERE id = '$id'";
    return mysqli_query($conn, $sql);
}
?>