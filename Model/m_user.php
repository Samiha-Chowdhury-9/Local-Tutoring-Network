<?php
require_once("../Model/m_dbConnect.php");

function authUser($username, $password) {
    $conn = dbConnect();
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    }
    return false;
}
?>