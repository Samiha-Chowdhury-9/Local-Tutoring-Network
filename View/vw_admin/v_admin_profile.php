<?php
session_start();
require_once("../../Model/m_profiles.php");
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){ header("Location: ../v_login.php"); exit(); }

$data = getAdminData($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html>
<head><title>Admin Profile</title><link rel="stylesheet" href="../v_css/common.css"></head>
<body>
    <h2>Admin Profile</h2>
    <p style="color:green;"><?php if(isset($_GET['success'])) echo $_GET['success']; ?></p>

    <table border="1" cellpadding="10" cellspacing="0" align="center">
        <tr><td>Username:</td><td><?php echo $data['username']; ?></td></tr>
        <tr><td>Email:</td><td><?php echo $data['email']; ?></td></tr>
        <tr><td>Role:</td><td><?php echo $data['role']; ?></td></tr>
    </table>
    <br>
    <a href="v_admin_edit_profile.php"><button>Edit Profile</button></a>
    <a href="v_admin_home.php">Back to Dashboard</a>
</body>
</html>