<?php
session_start();
require_once("../../Model/m_profiles.php");
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'tutor'){ header("Location: ../v_login.php"); exit(); }

$data = getTutorData($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html>
<head><title>Edit Profile</title><link rel="stylesheet" href="../v_css/common.css"></head>
<body>
    <h2>Edit Profile</h2>
    
    <form action="../../Controller/c_profiles.php" method="POST">
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $data['email']; ?>" required><br>

        <label>Education:</label>
        <input type="text" name="education_background" value="<?php echo $data['education_background']; ?>" required><br>

        <label>Institution:</label>
        <input type="text" name="institution" value="<?php echo $data['institution']; ?>" required><br>

        <label>Experience:</label>
        <input type="text" name="experience" value="<?php echo $data['experience']; ?>" required><br>

        <label>Subjects:</label>
        <input type="text" name="subjects" value="<?php echo $data['subjects']; ?>" required><br>

        <label>Bio:</label><br>
        <textarea name="short_bio" rows="5" cols="40"><?php echo $data['short_bio']; ?></textarea><br>

        <button type="submit" name="update_tutor">Update Profile</button>
    </form>
    
    <br><hr><br>
    
    <form action="../../Controller/c_profiles.php" method="POST" onsubmit="return confirm('Are you sure you want to delete your account?');">
        <button type="submit" name="delete_account" style="background-color:red; color:white;">Delete Account</button>
    </form>

    <br>
    <a href="v_tutor_profile.php">Cancel</a>
</body>
</html>