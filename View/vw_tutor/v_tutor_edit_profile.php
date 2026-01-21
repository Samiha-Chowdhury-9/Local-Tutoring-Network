<?php
session_start();
require_once("../../Model/m_profiles.php");
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'tutor'){ header("Location: ../v_login.php"); exit(); }

$data = getTutorData($_SESSION['user_id']);
$allSubjects = getAllSubjects(); 


$mySubjects = explode(", ", $data['subjects']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../v_css/common.css">
    <style>
        .checkbox-group { text-align: left; width: 250px; margin: 0 auto; }
        .checkbox-group label { display: inline-block; width: auto; font-weight: normal; }
        .checkbox-group input { display: inline-block; width: auto; margin-right: 10px; }
    </style>
</head>
<body>
    <h2>Edit Profile</h2>
    
    <p style="color:red;"><?php if(isset($_GET['error'])) echo $_GET['error']; ?></p>

    <form action="../../Controller/c_profiles.php" method="POST">
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $data['email']; ?>" required><br>

        <label>Hourly Rate (Tk):</label>
        <input type="number" name="hourly_rate" value="<?php echo $data['hourly_rate']; ?>" required><br>

        <label>Education:</label>
        <input type="text" name="education_background" value="<?php echo $data['education_background']; ?>" required><br>

        <label>Institution:</label>
        <input type="text" name="institution" value="<?php echo $data['institution']; ?>" required><br>

        <label>Experience:</label>
        <input type="text" name="experience" value="<?php echo $data['experience']; ?>" required><br>

        <label>Subjects:</label>
        <div class="checkbox-group">
            <?php foreach($allSubjects as $sub): ?>
                <?php 
                   
                    $checked = in_array($sub['subject_name'], $mySubjects) ? "checked" : ""; 
                ?>
                <input type="checkbox" name="subjects[]" value="<?php echo $sub['subject_name']; ?>" <?php echo $checked; ?>>
                <label><?php echo $sub['subject_name']; ?></label><br>
            <?php endforeach; ?>
        </div>
        <br>

        <label>Bio:</label><br>
        <textarea name="short_bio" rows="5" cols="40"><?php echo $data['short_bio']; ?></textarea><br>

        <button type="submit" name="update_tutor">Update Profile</button>
    </form>
    
    <br><hr><br>
    
    <a href="v_tutor_profile.php">Cancel</a>
</body>
</html>