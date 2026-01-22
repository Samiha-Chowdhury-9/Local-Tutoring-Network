<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location: ../v_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="vw_css/dashboardStyle.css">
</head>
<body>

    <h2 class="welcome-title">Welcome, <?php echo $_SESSION['username']; ?></h2>
    
    <div class="dashboard-panel">
        <h3>Dashboard Menu</h3>
        
        <a href="v_student-guardian_profile.php" class="nav-btn">My Profile</a>
        <a href="v_search_tutor.php" class="nav-btn">Search Tutor</a>
        <a href="v_my_bookings.php" class="nav-btn">My Bookings</a>
        <a href="v_resourses.php" class="nav-btn">Resources</a>
        
        <br>
        <a href="../v_logout.php" class="logout-link">Logout</a>
    </div>

</body>
</html>