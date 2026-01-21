<?php
require_once("../Model/m_dbConnect.php");


header('Content-Type: application/json');

if (isset($_POST['username'])) {
    $conn = dbConnect();
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    
   
    $query = "SELECT id FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
      
        echo json_encode(["status" => "taken", "message" => "❌ Username is already taken"]);
    } else {
        
        echo json_encode(["status" => "available", "message" => "✅ Username is available"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "No data received"]);
}
?>