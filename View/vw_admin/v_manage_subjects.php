<?php
session_start();
require_once("../../Model/m_admin.php");


if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){ 
    header("Location: ../v_login.php"); exit(); 
}

$subjects = getAllSubjects();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Subjects</title>
    <link rel="stylesheet" href="v_admin_style.css">
</head>
<body>
    <h2>Manage Subjects</h2>
    
    <?php 
    if(isset($_GET['msg'])) echo "<p style='color:green; text-align:center;'>".$_GET['msg']."</p>";
    if(isset($_GET['err'])) echo "<p style='color:red; text-align:center;'>".$_GET['err']."</p>"; 
    ?>

    <div class="subject-form">
        <form action="../../Controller/c_admin.php" method="POST">
            <input type="text" name="subject_name" class="input-box" placeholder="Enter new subject name..." required>
            <button type="submit" name="add_subject" class="btn-add">Add Subject</button>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>Subject Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($subjects) > 0): ?>
                <?php foreach ($subjects as $sub): ?>
                <tr>
                    <td><?php echo $sub['subject_name']; ?></td>
                    <td>
                        <form action="../../Controller/c_admin.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this subject?');">
                            <input type="hidden" name="subject_id" value="<?php echo $sub['id']; ?>">
                            <button type="submit" name="delete_subject" class="btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="2">No subjects found. Add one above!</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <br>
    <div style="text-align:center;">
        <button onclick="location.href='v_admin_home.php'">Back to Dashboard</button>
    </div>
</body>
</html>