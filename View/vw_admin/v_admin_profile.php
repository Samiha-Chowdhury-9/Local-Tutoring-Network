<?php
session_start();
require_once("../../Model/m_profiles.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){ 
    header("Location: ../v_login.php"); 
    exit(); 
}

$data = getAdminData($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="../../View/v_css/common.css?v=1.1">
    
    <style>
        body { padding-bottom: 40px; }

        /* Custom constraints optimized for individual data presentation matrices */
        .profile-card {
            max-width: 550px;
            margin-top: 3rem;
        }

        /* Clean alignment spacing adjustments specifically tailored for data view profiles */
        .profile-table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
            background: var(--text-light);
            border: 2px solid var(--border-color);
        }

        .profile-table th, .profile-table td {
            padding: 14px 18px;
            border: 1px solid var(--border-color);
        }

        .profile-table th {
            width: 35%;
            background-color: var(--primary-color);
            color: var(--text-light);
            font-weight: bold;
            text-align: left;
        }

        .profile-table td {
            background-color: var(--text-light);
            color: var(--text-dark);
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 25px;
        }

        .back-link {
            display: inline-block;
            text-align: center;
            color: var(--primary-color);
            font-weight: bold;
            text-decoration: none;
            margin-top: 10px;
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

    <div class="profile-card">
        <h2 style="text-align: center; margin-bottom: 20px;">Profile Details</h2>
        
        <?php if(isset($_GET['success'])): ?>
            <p class="success" style="text-align: center; margin-bottom: 15px;"><?php echo htmlspecialchars($_GET['success']); ?></p>
        <?php endif; ?>

        <table class="profile-table">
            <tr>
                <th>Username</th>
                <td><strong><?php echo htmlspecialchars($data['username']); ?></strong></td>
            </tr>
            <tr>
                <th>Email Address</th>
                <td><?php echo htmlspecialchars($data['email']); ?></td>
            </tr>
            <tr>
                <th>System Role</th>
                <td style="text-transform: capitalize; font-weight: 500; color: var(--primary-color);">
                    <?php echo htmlspecialchars($data['role']); ?>
                </td>
            </tr>
        </table>

        <div class="action-buttons">
            <button class="btn btn-primary" onclick="location.href='v_admin_edit_profile.php'" style="width: 100%;">Edit Profile</button>
            
            <div style="text-align: center;">
                <a href="v_admin_home.php" class="back-link">&larr; Back to Dashboard</a>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2026 Local Tutoring Network</p>
    </footer>

</body>
</html>