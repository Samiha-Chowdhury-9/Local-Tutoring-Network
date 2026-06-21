<?php
session_start();
require_once("../../Model/m_admin.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){ 
    header("Location: ../v_login.php"); exit(); 
}

$pendingTutors = getPendingTutors();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Manage Tutors</title>
    <!-- Corrected deep route to bind perfectly with your active master variables -->
    <link rel="stylesheet" href="../../View/v_css/common.css?v=1.1">
    
    <style>
        body { padding-bottom: 40px; }
        
        /* Action buttons layout tuning */
        .action-cell {
            white-space: nowrap;
            gap: 8px;
        }

        /* Specific clean inline style for action buttons inside the theme table */
        .btn-action {
            padding: 0.4rem 0.8rem;
            font-size: 0.85rem;
            border-radius: 4px;
        }

        .btn-approve-style {
            background-color: var(--text-light);
            color: var(--success);
            border-color: var(--success);
        }

        .btn-approve-style:hover {
            background-color: var(--success);
            color: var(--text-light);
        }

        .btn-reject-style {
            background-color: var(--text-light);
            color: var(--danger);
            border-color: var(--danger);
        }

        .btn-reject-style:hover {
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
        <h2 style="text-align: center; margin-bottom: 25px;">Pending Tutor Approvals</h2>
        
        <!-- Standard utility class message feedback blocks -->
        <?php if(isset($_GET['msg'])): ?>
            <p class="success" style="text-align: center; margin-bottom: 15px;"><?php echo htmlspecialchars($_GET['msg']); ?></p>
        <?php endif; ?>
        <?php if(isset($_GET['err'])): ?>
            <p class="error" style="text-align: center; margin-bottom: 15px;"><?php echo htmlspecialchars($_GET['err']); ?></p>
        <?php endif; ?>
        
        <table class="theme-table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Education</th>
                    <th>Subjects</th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($pendingTutors) > 0): ?>
                    <?php foreach ($pendingTutors as $tutor): ?>
                        <tr>
                            <td><strong><?php echo htmlspecialchars($tutor['username']); ?></strong></td>
                            <td><?php echo htmlspecialchars($tutor['email']); ?></td>
                            <td><?php echo htmlspecialchars($tutor['education_background']); ?></td>
                            <td><?php echo htmlspecialchars($tutor['subjects']); ?></td>
                            <td class="action-cell" style="text-align: center;">
                                
                                <form action="../../Controller/c_admin.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="user_id" value="<?php echo (int)$tutor['id']; ?>">
                                    <button type="submit" name="approve_user" class="btn btn-action btn-approve-style">Approve</button>
                                </form>

                                <form action="../../Controller/c_admin.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="user_id" value="<?php echo (int)$tutor['id']; ?>">
                                    <button type="submit" name="reject_user" class="btn btn-action btn-reject-style">Reject</button>
                                </form>
                                
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align: center; font-style: italic; color: var(--text-muted); padding: 30px;">
                            No pending tutors found.
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