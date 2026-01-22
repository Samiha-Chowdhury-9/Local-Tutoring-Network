<?php
session_start();
require_once("../../Model/m_notification.php"); 

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){ 
    header("Location: ../v_login.php"); exit(); 
}

$history = getAllNotifications();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Notifications</title>
    <link rel="stylesheet" href="v_admin_style.css">
    <style>
        .msg-box { width: 50%; margin: 30px auto; padding: 20px; border: 1px solid #ccc; text-align: center; }
        textarea { width: 90%; padding: 10px; border-radius: 5px; border: 1px solid #999; }
        .btn-send { background-color: purple; color: white; padding: 10px 20px; border: none; cursor: pointer; font-size: 1.1em; }
        
        table { width: 60%; margin: 20px auto; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        th { background-color: #eee; }
        .btn-del { background-color: red; color: white; border: none; padding: 5px 10px; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Broadcast Notification</h2>
    
    <?php 
    if(isset($_GET['msg'])) echo "<p style='color:green; text-align:center;'>".$_GET['msg']."</p>";
    if(isset($_GET['err'])) echo "<p style='color:red; text-align:center;'>".$_GET['err']."</p>"; 
    ?>

    <div class="msg-box">
        <form action="../../Controller/c_notification.php" method="POST">
            <h3>Send New Message</h3>
            <p>This will appear on Tutor and Student dashboards immediately.</p>
            
            <textarea name="message" rows="4" placeholder="e.g. System maintenance tonight at 10 PM..." required></textarea>
            <br><br>
            <button type="submit" name="send_broadcast" class="btn-send">Send to All</button>
        </form>
    </div>

    <hr>

    <h3 style="text-align:center;">Active Notifications</h3>
    <table>
        <thead>
            <tr>
                <th>Date Sent</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if(count($history) > 0): ?>
                <?php foreach($history as $n): ?>
                    <tr>
                        <td style="width: 20%;"><?php echo $n['created_at']; ?></td>
                        <td style="text-align:left;"><?php echo $n['message']; ?></td>
                        <td style="width: 15%;">
                            <form action="../../Controller/c_notification.php" method="POST" onsubmit="return confirm('Delete this message? It will disappear from all dashboards.');">
                                <input type="hidden" name="notification_id" value="<?php echo $n['id']; ?>">
                                <button type="submit" name="delete_notification" class="btn-del">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="3">No active notifications.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <br>
    <div style="text-align:center;">
        <button onclick="location.href='v_admin_home.php'">Back to Dashboard</button>
    </div>
</body>
</html>