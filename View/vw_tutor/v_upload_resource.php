<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'tutor'){ 
    header("Location: ../v_login.php"); exit(); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Upload Resource</title>
    <!-- Link to the universal theme (cache-busted) -->
    <link rel="stylesheet" href="../v_css/common.css?v=1.1">
    
    <style>
        body { padding-top: 40px; }

        .header-title {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid var(--border-color);
            padding-bottom: 10px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 5px;
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

    <div class="form-container" style="max-width: 600px;">
        <h2 class="header-title">Upload Study Resource</h2>
        
        <?php 
        if(isset($_GET['msg'])) echo "<p class='success' style='text-align:center;'>".htmlspecialchars($_GET['msg'])."</p>";
        if(isset($_GET['err'])) echo "<p class='error' style='text-align:center;'>".htmlspecialchars($_GET['err'])."</p>"; 
        ?>

        <!-- Note: Ensure your form has the enctype set for file uploads -->
        <form action="../../Controller/c_resources.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Title:</label>
                <input type="text" name="title" required>
            </div>

            <div class="form-group">
                <label>Subject:</label>
                <input type="text" name="subject" required>
            </div>

            <div class="form-group">
                <label>Select File:</label>
                <input type="file" name="file" required style="border:none; padding-left:0;">
            </div>

            <button type="submit" name="upload_resource" class="btn btn-primary" style="width: 100%; padding: 12px; font-size: 1.1rem;">Upload Resource</button>
        </form>
        
        <div style="text-align: center;">
            <a href="v_tutor_home.php" class="cancel-link">&larr; Back to Dashboard</a>
        </div>
    </div>

</body>
</html>