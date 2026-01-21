<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'tutor'){ header("Location: ../v_login.php"); exit(); }
?>
<!DOCTYPE html>
<html>
<head><title>Tutor Dashboard</title><link rel="stylesheet" href="../v_css/common.css"></head>
<body>

    <h1>Tutor Dashboard</h1>
    <p>Welcome, <?php echo $_SESSION['username']; ?></p>
    
    <?php
    require_once("../../Model/m_notification.php");
    $notice = getLatestNotification();
    ?>

    <?php if($notice): ?>
        <div style="background-color: #fff3cd; color: #856404; padding: 15px; border: 1px solid #ffeeba; text-align: center; margin-bottom: 20px;">
            <strong>📢 Admin Announcement:</strong><br>
            <?php echo $notice['message']; ?>
            <br>
            <small style="color:gray;"><?php echo $notice['created_at']; ?></small>
        </div>
    <?php endif; ?>

    <nav>
        <a href="v_tutor_profile.php"><button>My Profile</button></a>
        <a href="../v_logout.php"><button>Logout</button></a>
        <a href="v_manage_schedule.php"><button>Manage Schedule</button></a>
        <br><br>
        <a href="v_upload_resource.php"><button>Upload Resources</button></a>
        <br><br>
        <a href="v_my_feedback.php"><button>View Feedback</button></a>
        <br><br>
    </nav>
</body>
</html>