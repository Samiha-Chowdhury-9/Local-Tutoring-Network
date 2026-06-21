<?php
session_start();
require_once("../../Model/m_resources.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'student-guardian'){ 
    header("Location: ../v_login.php"); exit(); 
}

$resources = getAllResources(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Study Resources</title>
    <link rel="stylesheet" href="../v_css/common.css?v=1.1">
    
    <style>
        body {
            padding-top: 40px; 
        }

        .dashboard-container {
            max-width: 900px;
        }

        .header-title {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid var(--border-color);
            padding-bottom: 10px;
        }

        .btn-download {
            background-color: var(--text-light);
            color: var(--primary-color);
            padding: 8px 15px;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
            border: 2px solid var(--border-color);
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .btn-download:hover {
            background-color: var(--primary-hover);
            color: var(--text-light);
        }

        .cancel-link {
            display: inline-block;
            margin-top: 30px;
            color: var(--primary-color);
            font-weight: bold;
            text-decoration: none;
        }
        
        .cancel-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h2 class="header-title">Study Resources</h2>
        <p style="text-align:center; color: #444; margin-bottom: 25px;">Download study materials and documents shared by tutors.</p>

        <?php if(isset($_GET['err'])): ?>
            <p class="error" style="text-align:center;"><?php echo htmlspecialchars($_GET['err']); ?></p>
        <?php endif; ?>

        <table class="theme-table">
            <thead>
                <tr>
                    <th>Resource Details</th>
                    <th>Uploaded By</th>
                    <th>Date</th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($resources) && count($resources) > 0): ?>
                    <?php foreach($resources as $res): ?>
                        <tr>
                            <td>
                                <strong><?php echo htmlspecialchars($res['title']); ?></strong><br>
                                <span style="color: var(--text-muted); font-size: 0.9em;">Subject: <?php echo htmlspecialchars($res['subject'] ?? 'Not Specified'); ?></span>
                            </td>
                            <td>
                                <strong><?php echo htmlspecialchars($res['tutor_name']); ?></strong>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($res['upload_date']); ?>
                            </td>
                            <td style="text-align: center;">
                                <a href="../../uploads/<?php echo htmlspecialchars($res['file_name']); ?>" class="btn-download" download>Download</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="4" style="text-align:center; font-style: italic;">No resources available at the moment.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div style="text-align:center;">
            <a href="v_student-guardian_home.php" class="cancel-link">&larr; Back to Dashboard</a>
        </div>
    </div>
</body>
</html>