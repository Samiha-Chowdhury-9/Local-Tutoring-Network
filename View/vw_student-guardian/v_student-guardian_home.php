<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'student-guardian'){ 
    header("Location: ../v_login.php"); exit(); 
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="../homeStyle.css"> 
</head>
<body>
    <h1>Student Dashboard</h1>
    <p>Welcome, <?php echo $_SESSION['username']; ?></p>
    
    <nav>
        <button onclick="location.href='v_student-guardian_profile.php'">My Profile</button>
        <br><br>
        <button onclick="location.href='../v_logout.php'">Logout</button>
    </nav>
</body>
</html>