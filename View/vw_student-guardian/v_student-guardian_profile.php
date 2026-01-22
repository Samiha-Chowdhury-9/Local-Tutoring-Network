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
    <link rel="stylesheet" href="vw_css/profile.css">
</head>
<body>
    <header>
        <h1>Student Profile</h1>
    </header>

    <main>
        <div class="center-box">
            <h3>Profile Details</h3>
            
            <?php if(isset($_GET['success'])) echo "<p class='success'>".$_GET['success']."</p>"; ?>

            <table>
                <tr>
                    <th>Username:</th>
                    <td><?php echo $data['username']; ?></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><?php echo $data['email']; ?></td>
                </tr>
                <tr>
                    <th>Education:</th>
                    <td><?php echo $data['education_background']; ?></td>
                </tr>
                <tr>
                    <th>Institution:</th>
                    <td><?php echo $data['institution']; ?></td>
                </tr>
                <tr>
                    <th>Location:</th>
                    <td><?php echo $data['location']; ?></td>
                </tr>
                <tr>
                    <th>Status:</th>
                    <td>
                        <?php 
                        if(isset($data['status'])) {
                            echo "<b>" . ucfirst($data['status']) . "</b>";
                        } else {
                            echo "<i>Active</i>"; 
                        }
                        ?>
                    </td>
                </tr>
            </table>

            <br>
            <button class="btn" onclick="location.href='v_student-guardian_edit_profile.php'">Edit Profile</button>
            <a href="v_student-guardian_home.php" class="back-link">Back to Dashboard</a>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 Local Tutoring Network</p>
    </footer>
</body>
</html>