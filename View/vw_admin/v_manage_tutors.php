<?php
session_start();
require_once("../../Model/m_admin.php");


if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){ 
    header("Location: ../v_login.php"); exit(); 
}

$pendingTutors = getPendingTutors();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Tutors</title>
    <link rel="stylesheet" href="v_admin_style.css">
</head>
<body>
    <h2>Pending Tutor Approvals</h2>
    
    <?php 
    if(isset($_GET['msg'])) echo "<p style='color:green'>".$_GET['msg']."</p>";
    if(isset($_GET['err'])) echo "<p style='color:red'>".$_GET['err']."</p>"; 
    ?>
    
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Education</th>
                <th>Subjects</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($pendingTutors) > 0): ?>
                <?php foreach ($pendingTutors as $tutor): ?>
                    <tr>
                        <td><?php echo $tutor['username']; ?></td>
                        <td><?php echo $tutor['email']; ?></td>
                        <td><?php echo $tutor['education_background']; ?></td>
                        <td><?php echo $tutor['subjects']; ?></td>
                        <td>
                            <form action="../../Controller/c_admin.php" method="POST" style="display:inline;">
                                <input type="hidden" name="user_id" value="<?php echo $tutor['id']; ?>">
                                <button type="submit" name="approve_user" class="btn-approve">Approve</button>
                            </form>

                            <form action="../../Controller/c_admin.php" method="POST" style="display:inline;">
                                <input type="hidden" name="user_id" value="<?php echo $tutor['id']; ?>">
                                <button type="submit" name="reject_user" class="btn-reject">Reject</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5">No pending tutors found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <br>
    <button onclick="location.href='v_admin_home.php'">Back to Dashboard</button>
</body>
</html>