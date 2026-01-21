<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbName = "ltn";

function dbConnect() {
    global $host, $user, $pass, $dbName;
    $conn = mysqli_connect($host, $user, $pass, $dbName);
    if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }
    return $conn;
}
?>