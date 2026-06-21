<?php
session_start();
require_once("../../Model/m_profiles.php");
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'tutor'){ header("Location: ../v_login.php"); exit(); }

$data = getTutorData($_SESSION['user_id']);
$allSubjects = getAllSubjects(); 

// Fallback added in case subjects is empty in the database
$mySubjects = explode(", ", $data['subjects'] ?? '');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../v_css/common.css?v=1.1">
    <style>
        body {
            padding-top: 40px; 
        }

        .form-container {
            max-width: 700px !important; 
            width: 95%; 
            margin: 20px auto;
        }

        .header-title {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid var(--border-color);
            padding-bottom: 10px;
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

        .checkbox-group { 
            background-color: var(--text-light);
            border: 1px solid var(--border-color);
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 15px;
            display: flex;
            flex-wrap: wrap;
            gap: 15px; 
        }
        .checkbox-item {
            display: inline-flex;
            align-items: center;
        }
        .checkbox-item input {
            width: auto;
            margin: 0 8px 0 0;
            transform: scale(1.2);
        }
        .checkbox-item label {
            font-weight: normal;
            color: var(--text-dark);
            cursor: pointer;
            margin: 0;
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
        <h2 class="header-title">Edit Tutor Profile</h2>
        
        <?php if(isset($_GET['error'])): ?>
            <p class="error" style="text-align:center;"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>

        <form action="../../Controller/c_profiles.php" method="POST">
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($data['email'] ?? ''); ?>" required>
            </div>

            <div class="form-group">
                <label>Hourly Rate (Tk):</label>
                <input type="number" name="hourly_rate" value="<?php echo htmlspecialchars($data['hourly_rate'] ?? ''); ?>" required>
            </div>

            <div class="form-group">
                <label>Education Background:</label>
                <input type="text" name="education_background" value="<?php echo htmlspecialchars($data['education_background'] ?? ''); ?>" required>
            </div>

            <div class="form-group">
                <label>Institution:</label>
                <input type="text" name="institution" value="<?php echo htmlspecialchars($data['institution'] ?? ''); ?>" required>
            </div>

            <div class="form-group">
                <label>Experience:</label>
                <input type="text" name="experience" value="<?php echo htmlspecialchars($data['experience'] ?? ''); ?>" required>
            </div>

            <div class="form-group">
                <label>Subjects:</label>
                <div class="checkbox-group">
                    <?php foreach($allSubjects as $sub): ?>
                        <?php 
                            $checked = in_array($sub['subject_name'], $mySubjects) ? "checked" : ""; 
                        ?>
                        <div class="checkbox-item">
                            <input type="checkbox" id="sub_<?php echo $sub['id']; ?>" name="subjects[]" value="<?php echo htmlspecialchars($sub['subject_name']); ?>" <?php echo $checked; ?>>
                            <label for="sub_<?php echo $sub['id']; ?>"><?php echo htmlspecialchars($sub['subject_name']); ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="form-group">
                <label>Short Bio:</label>
                <textarea name="short_bio" rows="5"><?php echo htmlspecialchars($data['short_bio'] ?? ''); ?></textarea>
            </div>

            <button type="submit" name="update_tutor" class="btn btn-primary" style="width: 100%; padding: 12px; font-size: 1.1rem;">Update Profile</button>
        </form>
        
        <div style="text-align: center;">
            <a href="v_tutor_profile.php" class="cancel-link">&larr; Cancel and Return</a>
        </div>
    </div>

</body>
</html>