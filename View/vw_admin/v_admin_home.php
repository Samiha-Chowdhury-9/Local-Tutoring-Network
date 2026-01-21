<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){ 
    header("Location: ../v_login.php"); exit(); 
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../../View/homeStyle.css">
</head>
<body>
    <h1>Admin Dashboard</h1>
    <p>Welcome, <?php echo $_SESSION['username']; ?></p>
    
    <nav>
        <button onclick="location.href='v_profile.php'">My Profile</button>
        <br><br>
        
        <button onclick="location.href='v_manage_tutors.php'">Manage Tutor Approvals</button>
        
        <br><br>
        <button onclick="location.href='../../View/v_logout.php'">Logout</button>
    </nav>
</body>
</html>