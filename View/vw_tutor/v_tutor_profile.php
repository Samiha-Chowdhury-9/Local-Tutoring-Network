<?php
session_start();
require_once("../../Model/m_profiles.php");
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'tutor'){ header("Location: ../v_login.php"); exit(); }

$data = getTutorData($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html>
<head><title>My Profile</title><link rel="stylesheet" href="../v_css/common.css"></head>
<body>
    <h2>My Tutor Profile</h2>
    <p style="color:green;"><?php if(isset($_GET['success'])) echo $_GET['success']; ?></p>

    <table border="1" cellpadding="10" cellspacing="0" align="center">
        <tr><td>Username:</td><td><?php echo $data['username']; ?></td></tr>
        <tr><td>Email:</td><td><?php echo $data['email']; ?></td></tr>
        <tr><td>Education:</td><td><?php echo $data['education_background']; ?></td></tr>
        <tr><td>Institution:</td><td><?php echo $data['institution']; ?></td></tr>
        <tr><td>Experience:</td><td><?php echo $data['experience']; ?></td></tr>
        <tr><td>Subjects:</td><td><?php echo $data['subjects']; ?></td></tr>
        <tr><td>Bio:</td><td><?php echo $data['short_bio']; ?></td></tr>
        <tr><td>Hourly Rate:</td><td><?php echo $data['hourly_rate']; ?> Tk</td></tr>
    </table>
    <br>
    <a href="v_tutor_edit_profile.php"><button>Edit Profile</button></a>
    <a href="v_tutor_home.php">Back to Dashboard</a>
</body>
</html>