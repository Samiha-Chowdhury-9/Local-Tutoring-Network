<?php
session_start();
require_once("../../Model/m_admin.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){ 
    header("Location: ../v_login.php"); exit(); 
}

$subjects = getAllSubjects();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Manage Subjects</title>
    <link rel="stylesheet" href="../../View/v_css/common.css?v=1.1">
    
    <style>
        body { padding-bottom: 40px; }

        /* Unified Inline Add-Subject Form styling layout */
        .subject-form-wrapper {
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px dashed var(--border-color);
        }

        .inline-form {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .inline-form input[type="text"] {
            margin-bottom: 0; /* Remove baseline spacing to align flat with the submit button */
            flex: 1;
        }

        .btn-add-subject {
            background-color: var(--text-light);
            color: var(--primary-color);
            white-space: nowrap;
            height: 46px; /* Matches form input padding block layout height */
        }

        .btn-add-subject:hover {
            background-color: var(--primary-color);
            color: var(--text-light);
        }

        /* Specific clean style for delete operations inside rows */
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
        <h2 style="text-align: center; margin-bottom: 25px;">Manage Network Subjects</h2>
        
        <?php if(isset($_GET['msg'])): ?>
            <p class="success" style="text-align: center; margin-bottom: 15px;"><?php echo htmlspecialchars($_GET['msg']); ?></p>
        <?php endif; ?>
        <?php if(isset($_GET['err'])): ?>
            <p class="error" style="text-align: center; margin-bottom: 15px;"><?php echo htmlspecialchars($_GET['err']); ?></p>
        <?php endif; ?>

        <div class="subject-form-wrapper">
            <form action="../../Controller/c_admin.php" method="POST" class="inline-form">
                <input type="text" name="subject_name" placeholder="Enter new subject name..." required autocomplete="off">
                <button type="submit" name="add_subject" class="btn btn-add-subject">Add Subject</button>
            </form>
        </div>

        <table class="theme-table">
            <thead>
                <tr>
                    <th>Subject Name</th>
                    <th style="width: 150px; text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($subjects) > 0): ?>
                    <?php foreach ($subjects as $sub): ?>
                    <tr>
                        <td><strong><?php echo htmlspecialchars($sub['subject_name']); ?></strong></td>
                        <td style="text-align: center;">
                            <form action="../../Controller/c_admin.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this subject?');" style="display:inline;">
                                <input type="hidden" name="subject_id" value="<?php echo (int)$sub['id']; ?>">
                                <button type="submit" name="delete_subject" class="btn btn-delete-row">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="2" style="text-align: center; font-style: italic; color: var(--text-muted); padding: 25px;">
                            No subjects found. Add one above!
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