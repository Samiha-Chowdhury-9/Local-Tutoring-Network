<?php
session_start();
require_once("../../Model/m_profiles.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'student-guardian'){ 
    header("Location: ../v_login.php"); exit(); 
}

$data = getStudentData($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../v_css/common.css?v=1.1">
    
    <style>
        body {
            /* Adds a little breathing room at the top of the page */
            padding-top: 40px; 
        }
        
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 5px;
        }

        .header-title {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid var(--border-color);
            padding-bottom: 10px;
        }

        /* Danger Button for Deletion */

        .btn-danger {
            background-color: #607d8b; /* Soothing Slate Blue */
            color: white;
            border-color: #455a64;
        }

        .btn-danger:hover {
            background-color: #455a64; /* Darker slate on hover */
            color: white;
        }
        
        .cancel-link {
            display: inline-block;
            margin-top: 20px;
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

    <div class="form-container">
        <h2 class="header-title">Edit Student Profile</h2>
        
        <?php if(isset($_GET['error'])): ?>
            <p class="error" style="text-align:center;"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>

        <form action="../../Controller/c_profiles.php" method="POST">
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($data['email']); ?>" required>
            </div>

            <div class="form-group">
                <label>Education:</label>
                <input type="text" name="education_background" value="<?php echo htmlspecialchars($data['education_background']); ?>" required>
            </div>

            <div class="form-group">
                <label>Institution:</label>
                <input type="text" name="institution" value="<?php echo htmlspecialchars($data['institution']); ?>" required>
            </div>

            <div class="form-group">
                <label>Location:</label>
                <input type="text" name="location" value="<?php echo htmlspecialchars($data['location']); ?>" required>
            </div>

            <button type="submit" name="update_student" class="btn btn-primary" style="width: 100%;">Update Profile</button>
        </form>
        
        <hr style="margin: 30px 0; border: 0; border-top: 2px solid var(--border-color);">
        
        <form action="../../Controller/c_profiles.php" method="POST" onsubmit="return confirm('Are you sure you want to delete your account? This cannot be undone.');">
            <button type="submit" name="delete_account" class="btn btn-danger" style="width: 100%;">Delete Account</button>
        </form>

        <div style="text-align: center;">
            <a href="v_student-guardian_profile.php" class="cancel-link">&larr; Cancel and Return</a>
        </div>
    </div>

</body>
</html>