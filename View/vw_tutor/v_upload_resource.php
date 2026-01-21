<?php
session_start();

require_once("../../Model/m_resources.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'tutor'){ 
    header("Location: ../v_login.php"); exit(); 
}

$myFiles = getTutorResources($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload Resources</title>
    <link rel="stylesheet" href="../../View/v_css/common.css">
</head>
<body>
    <h2>Share Resources</h2>
    
    <?php 
    if(isset($_GET['msg'])) echo "<p style='color:green'>".$_GET['msg']."</p>";
    if(isset($_GET['err'])) echo "<p style='color:red'>".$_GET['err']."</p>"; 
    ?>

    <div style="border:1px solid #ddd; padding:20px; width:50%; margin:0 auto;">
        <form action="../../Controller/c_resources.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="File Title (e.g. Math Notes)" required style="width:90%;">
            <br>
            <input type="file" name="file" required style="margin:10px 0;">
            <br>
            <button type="submit" name="upload_file">Upload</button>
        </form>
    </div>

    <hr>

    <h3>My Uploads</h3>
    <table border="1" style="width:80%; margin:0 auto; border-collapse:collapse;">
        <tr>
            <th>Title</th>
            <th>Filename</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        <?php if (!empty($myFiles)): ?>
            <?php foreach($myFiles as $file): ?>
            <tr>
                <td><?php echo $file['title']; ?></td>
                <td><?php echo $file['file_name']; ?></td>
                <td><?php echo $file['upload_date']; ?></td>
                <td>
                    <form action="../../Controller/c_resources.php" method="POST">
                        <input type="hidden" name="resource_id" value="<?php echo $file['id']; ?>">
                        <button type="submit" name="delete_file" style="background-color:red; color:white;">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="4">No files uploaded yet.</td></tr>
        <?php endif; ?>
    </table>
    
    <br>
    <button onclick="location.href='v_tutor_home.php'">Back to Dashboard</button>
</body>
</html>