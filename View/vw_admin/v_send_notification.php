<?php
session_start();
require_once("../../Model/m_notification.php"); 

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){ 
    header("Location: ../v_login.php"); exit(); 
}

$history = getAllNotifications();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Manage Notifications</title>
    <link rel="stylesheet" href="../../View/v_css/common.css?v=1.1">
    
    <style>
        body { padding-bottom: 40px; }

        /* Custom spacing wrapper matching the layout width of the theme table */
        .broadcast-box {
            border: 1px solid var(--border-color);
            background-color: var(--text-light);
            border-radius: 6px;
            padding: 25px;
            margin-bottom: 2.5rem;
        }

        .broadcast-box h3 {
            margin-top: 0;
            color: var(--primary-color);
        }

        .broadcast-hint {
            font-size: 0.9rem;
            color: var(--text-muted);
            margin-bottom: 1.2rem;
            margin-top: -5px;
        }

        /* Clean style for the primary broadcast action button */
        .btn-broadcast {
            background-color: var(--text-light);
            color: var(--primary-color);
            width: 100%;
            padding: 0.75rem;
        }

        .btn-broadcast:hover {
            background-color: var(--primary-color);
            color: var(--text-light);
        }

        /* Styled delete action inside table records */
        .btn-delete-row {
            padding: 0.4rem 0.8rem;
            font-size: 0.85rem;
            background-color: var(--text-light);
            color: var(--danger);
            border-color: var(--danger);
            border-radius: 4px;
        }

        .btn-delete-row:hover {
            background-color: var(--danger);
            color: var(--text-light);
        }

        .back-link {
            display: inline-block;
            margin-top: 25px;
            color: var(--primary-color);
            font-weight: bold;
            text-decoration: none;
        }
        
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <header>
        <h1>Admin Dashboard</h1>
    </header>

    <div class="dashboard-container">
        <h2 style="text-align: center; margin-bottom: 25px;">Broadcast Notification</h2>
        
        <?php if(isset($_GET['msg'])): ?>
            <p class="success" style="text-align: center; margin-bottom: 15px;"><?php echo htmlspecialchars($_GET['msg']); ?></p>
        <?php endif; ?>
        <?php if(isset($_GET['err'])): ?>
            <p class="error" style="text-align: center; margin-bottom: 15px;"><?php echo htmlspecialchars($_GET['err']); ?></p>
        <?php endif; ?>

        <div class="broadcast-box">
            <form action="../../Controller/c_notification.php" method="POST">
                <h3>Send New Message</h3>
                <p class="broadcast-hint">This will appear on Tutor and Student dashboards immediately.</p>
                
                <textarea name="message" rows="4" placeholder="e.g. System maintenance tonight at 10 PM..." required></textarea>
                
                <button type="submit" name="send_broadcast" class="btn btn-broadcast">Send to All</button>
            </form>
        </div>

        <hr style="margin: 30px 0; border: 0; border-top: 2px solid var(--border-color);">

        <h3 style="text-align: center; margin-bottom: 20px;">Active System Notifications</h3>
        
        <table class="theme-table">
            <thead>
                <tr>
                    <th style="width: 180px; text-align: center;">Date Sent</th>
                    <th>Message</th>
                    <th style="width: 120px; text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($history) > 0): ?>
                    <?php foreach($history as $n): ?>
                        <tr>
                            <td style="text-align: center; color: var(--text-muted); font-size: 0.9rem;">
                                <?php echo htmlspecialchars(date("M d, Y h:i A", strtotime($n['created_at']))); ?>
                            </td>
                            <td><?php echo nl2br(htmlspecialchars($n['message'])); ?></td>
                            <td style="text-align: center;">
                                <form action="../../Controller/c_notification.php" method="POST" onsubmit="return confirm('Delete this message? It will disappear from all dashboards.');" style="display:inline;">
                                    <input type="hidden" name="notification_id" value="<?php echo (int)$n['id']; ?>">
                                    <button type="submit" name="delete_notification" class="btn btn-delete-row">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" style="text-align: center; font-style: italic; color: var(--text-muted); padding: 25px;">
                            No active notifications broadcasted yet.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div style="text-align: center;">
            <a href="v_admin_home.php" class="back-link">&larr; Back to Dashboard</a>
        </div>
    </div>

    <footer>
        <p>&copy; 2026 Local Tutoring Network</p>
    </footer>

</body>
</html>