<?php
session_start();
require_once("../../Model/m_profiles.php");


if(!isset($_SESSION['role']) || $_SESSION['role'] != 'student-guardian'){ 
    header("Location: ../v_login.php"); exit(); 
}


$data = getStudentData($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>
    <link rel="stylesheet" href="../homeStyle.css">
    <style>
        table { margin: 20px auto; width: 50%; border-collapse: collapse; }
        td { padding: 10px; text-align: left; }
    </style>
</head>
<body>
    <h2>My Student Profile</h2>
    
    <p style="color:green;"><?php if(isset($_GET['success'])) echo $_GET['success']; ?></p>

    <table border="1">
        <tr>
            <td><strong>Username:</strong></td>
            <td><?php echo $data['username']; ?></td>
        </tr>
        <tr>
            <td><strong>Email:</strong></td>
            <td><?php echo $data['email']; ?></td>
        </tr>
        <tr>
            <td><strong>Education:</strong></td>
            <td><?php echo $data['education_background']; ?></td>
        </tr>
        <tr>
            <td><strong>Institution:</strong></td>
            <td><?php echo $data['institution']; ?></td>
        </tr>
        <tr>
            <td><strong>Location:</strong></td>
            <td><?php echo $data['location']; ?></td>
        </tr>
    </table>

    <br>
    <button onclick="location.href='v_student-guardian_edit_profile.php'">Edit Profile</button>
    <br><br>
    <button onclick="location.href='v_student-guardian_home.php'">Back to Dashboard</button>
</body>
</html>