<?php
session_start();
require_once("../../Model/m_profiles.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){ 
    header("Location: ../v_login.php"); 
    exit(); 
}

$data = getAdminData($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Profile</title>
    <link rel="stylesheet" href="v_admin_style.css">
</head>
<body>
    <header>
        <h1>Admin Profile</h1>
    </header>

    <main>
        <div class="center-box">
            <h3>Profile Details</h3>
            
            <?php if(isset($_GET['success'])) echo "<p class='success'>".$_GET['success']."</p>"; ?>

            <table class="profile-table">
                <tr>
                    <th>Username:</th>
                    <td><?php echo $data['username']; ?></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><?php echo $data['email']; ?></td>
                </tr>
                <tr>
                    <th>Role:</th>
                    <td><?php echo $data['role']; ?></td>
                </tr>
            </table>

            <br>
            
            <button class="btn" onclick="location.href='v_admin_edit_profile.php'">Edit Profile</button>
            <button class="back-link" onclick="location.href='v_admin_home.php'">Back to Dashboard</button>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 Local Tutoring Network</p>
    </footer>
</body>
</html>