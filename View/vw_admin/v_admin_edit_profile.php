<?php
session_start();
require_once("../../Model/m_profiles.php");
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){ header("Location: ../v_login.php"); exit(); }

$data = getAdminData($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html>
<head><title>Edit Admin</title><link rel="stylesheet" href="../v_css/common.css"></head>
<body>
    <h2>Edit Admin Profile</h2>
    
    <form action="../../Controller/c_profiles.php" method="POST">
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $data['email']; ?>" required><br>

        <button type="submit" name="update_admin">Update Profile</button>
    </form>
    
    <br>
    <a href="v_admin_profile.php">Cancel</a>
</body>
</html>