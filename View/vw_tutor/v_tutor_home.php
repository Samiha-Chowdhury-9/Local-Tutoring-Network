<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'tutor'){ header("Location: ../v_login.php"); exit(); }
?>
<!DOCTYPE html>
<html>
<head><title>Tutor Dashboard</title><link rel="stylesheet" href="../v_css/common.css"></head>
<body>
    <h1>Tutor Dashboard</h1>
    <p>Welcome, <?php echo $_SESSION['username']; ?></p>
    
    <nav>
        <a href="v_tutor_profile.php"><button>My Profile</button></a>
        <a href="../v_logout.php"><button>Logout</button></a>
        <a href="v_manage_schedule.php"><button>Manage Schedule</button></a>
        <br><br>
    </nav>
</body>
</html>