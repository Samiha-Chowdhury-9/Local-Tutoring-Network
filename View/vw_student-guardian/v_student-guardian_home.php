<?php
session_start();

require_once("../../Model/m_notification.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'student-guardian'){
    header("Location: ../v_login.php");
    exit();
}

$notice = getLatestNotification();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="../v_css/common.css">
        <script src="vw_js/home.js" defer> 
        </script>
</head>
<body>
    <h1>Student Dashboard</h1>
    <h3>Welcome, <?php echo $_SESSION['username']; ?></h3>

    <?php if($notice): ?>
        <div style="background-color: #fff3cd; color: #856404; padding: 15px; border: 1px solid #ffeeba; text-align: center; margin-bottom: 20px; width: 80%; margin: 10px auto;">
            <strong>📢 Admin Announcement:</strong><br>
            <?php echo $notice['message']; ?>
            <br>
            <small style="color:gray;">(Sent: <?php echo $notice['created_at']; ?>)</small>
        </div>
    <?php endif; ?>
    
    <div style="margin-top: 20px;">
        <button onclick="loadTutors()">Find Tutors</button> 
        <br><br>
        <button onclick="location.href='v_my_bookings.php'">My Bookings</button> 
        <br><br>
        <button onclick="location.href='v_resourses.php'">Resources</button> 
        <br><br>
        <button onclick="location.href='v_student-guardian_profile.php'">My Profile</button>
        <br><br>
        <button onclick="location.href='../v_logout.php'" style="background-color: red; color: white;">Logout</button>
    </div>

    <hr>

    <div id="result_area" style="margin-top: 20px;">
    </div>


</body>
</html>