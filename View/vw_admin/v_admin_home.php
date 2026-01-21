<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){ header("Location: ../v_login.php"); exit(); }
?>
<!DOCTYPE html>
<html>
<head><title>Admin Dashboard</title><link rel="stylesheet" href="../v_css/common.css"></head>
<body>
    <h1>Admin Dashboard</h1>
    <p>Welcome, <?php echo $_SESSION['username']; ?></p>
    
    <nav>
        <a href="v_admin_profile.php"><button>My Profile</button></a>
        <a href="../v_logout.php"><button>Logout</button></a>
    </nav>
</body>
</html>