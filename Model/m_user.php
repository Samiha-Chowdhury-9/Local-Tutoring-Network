<?php
require_once("m_dbConnect.php");

function authUser($username, $password) {
    $conn = dbConnect();
    $safeUser = mysqli_real_escape_string($conn, $username);
    
   
    $query = "SELECT * FROM users WHERE username='$safeUser' AND password='$password'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    }
    return false;
}
?>