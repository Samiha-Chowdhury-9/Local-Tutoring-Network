<?php
session_start();
require_once("../../Model/m_profiles.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'tutor'){ 
    header("Location: ../v_login.php"); 
    exit(); 
}

$data = getTutorData($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>
    <link rel="stylesheet" href="v_tutor_style.css">
</head>
<body>
    <header>
        <h1>Tutor Profile</h1>
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
                    <th>Hourly Rate:</th>
                    <td><?php echo $data['hourly_rate']; ?> Tk</td>
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
                    <th>Experience:</th>
                    <td><?php echo $data['experience']; ?></td>
                </tr>
                <tr>
                    <th>Subjects:</th>
                    <td><?php echo $data['subjects']; ?></td>
                </tr>
                <tr>
                    <th>Status:</th>
                    <td>
                        <?php 
                        if(isset($data['status'])) {
                            echo "<b>" . ucfirst($data['status']) . "</b>";
                        } else {
                            echo "<i>N/A</i>"; 
                        }
                        ?>
                    </td>
                </tr>
            </table>

            <br>
            <button class="btn" onclick="location.href='v_tutor_edit_profile.php'">Edit Profile</button>
            <a href="v_tutor_home.php" class="back-link">Back to Dashboard</a>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 Local Tutoring Network</p>
    </footer>
</body>
</html>