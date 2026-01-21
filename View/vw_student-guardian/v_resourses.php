<?php
session_start();
require_once("../../Model/m_resources.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'student-guardian'){ 
    header("Location: ../v_login.php"); exit(); 
}

$allFiles = getAllResources();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Resources</title>
    <link rel="stylesheet" href="../v_css/common.css">
</head>
<body>
    <h2>Learning Resources</h2>
    <p>Download materials shared by tutors.</p>

    <table border="1" style="width:80%; margin:0 auto; border-collapse:collapse;">
        <thead>
            <tr style="background-color:skyblue;">
                <th>Title</th>
                <th>Tutor</th>
                <th>Date</th>
                <th>Download</th>
            </tr>
        </thead>
        <tbody>
            <?php if(count($allFiles) > 0): ?>
                <?php foreach($allFiles as $file): ?>
                    <tr>
                        <td><?php echo $file['title']; ?></td>
                        <td><?php echo $file['tutor_name']; ?></td>
                        <td><?php echo $file['upload_date']; ?></td>
                        <td>
                            <a href="../../uploads/<?php echo $file['file_name']; ?>" download>
                                <button style="background-color:green; color:white;">Download</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="4">No resources uploaded yet.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <br>
    <button onclick="location.href='v_student-guardian_home.php'">Back to Dashboard</button>
</body>
</html>