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
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../homeStyle.css">
</head>
<body>
    <h2>Edit Student Profile</h2>
    <p style="color:red;"><?php if(isset($_GET['error'])) echo $_GET['error']; ?></p>

    <form action="../../Controller/c_profiles.php" method="POST">
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $data['email']; ?>" required><br>

        <label>Education:</label>
        <input type="text" name="education_background" value="<?php echo $data['education_background']; ?>" required><br>

        <label>Institution:</label>
        <input type="text" name="institution" value="<?php echo $data['institution']; ?>" required><br>

        <label>Location:</label>
        <input type="text" name="location" value="<?php echo $data['location']; ?>" required><br>

        <button type="submit" name="update_student">Update Profile</button>
    </form>
    
    <br><hr><br>
    
    <form action="../../Controller/c_profiles.php" method="POST" onsubmit="return confirm('Are you sure you want to delete your account? This cannot be undone.');">
        <button type="submit" name="delete_account" style="background-color:red; color:white;">Delete Account</button>
    </form>

    <br>
    <a href="v_student-guardian_profile.php">Cancel</a>
</body>
</html>