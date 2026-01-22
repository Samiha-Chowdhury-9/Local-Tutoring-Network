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
    <link rel="stylesheet" href="v_admin_style.css">
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>

    <main>
        <div class="center-box">
            <h3>Welcome, <?php echo $_SESSION['username']; ?></h3>
            
            <div class="button-stack">
                <button class="btn" onclick="location.href='v_admin_profile.php'">My Profile</button>
                <button class="btn" onclick="location.href='v_manage_tutors.php'">Manage Tutor Approvals</button>
                <button class="btn" onclick="location.href='v_manage_subjects.php'">Manage Subjects</button>
                <button class="btn" onclick="location.href='v_send_notification.php'">Send Bulk Notification</button>
                <br>
                <button class="btn logout-btn" onclick="location.href='../../View/v_logout.php'">Logout</button>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 Local Tutoring Network</p>
    </footer>
</body>
</html>