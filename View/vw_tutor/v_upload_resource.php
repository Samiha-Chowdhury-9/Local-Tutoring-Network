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

        /* --- Styled Upload Button --- */
        .file-input-wrapper input[type="file"] { display: none; }
        .file-label {
            display: inline-block;
            padding: 10px 20px;
            background-color: var(--text-light);
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .file-label:hover {
            background-color: var(--primary-color);
            color: white;
        }
        #file-name { margin-left: 10px; color: var(--text-muted); font-size: 0.9em; }

        .cancel-link {
            display: inline-block;
            margin-top: 20px;
            color: var(--primary-color);
            font-weight: bold;
            text-decoration: none;
        }
        .cancel-link:hover { text-decoration: underline; }
    </style>
</head>
<body>

    <div class="form-container" style="max-width: 600px;">
        <h2 class="header-title">Upload Study Resource</h2>
        
        <?php 
        if(isset($_GET['msg'])) echo "<p class='success' style='text-align:center;'>".htmlspecialchars($_GET['msg'])."</p>";
        if(isset($_GET['err'])) echo "<p class='error' style='text-align:center;'>".htmlspecialchars($_GET['err'])."</p>"; 
        ?>

        <form action="../../Controller/c_resources.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Title:</label>
                <input type="text" name="title" required>
            </div>

            <div class="form-group">
                <label>Subject:</label>
                <input type="text" name="subject" required>
            </div>

            <div class="form-group file-input-wrapper">
                <label>Select File:</label>
                <label for="actual-file" class="file-label">Choose File</label>
                <span id="file-name">No file chosen</span>
                <input type="file" id="actual-file" name="file" onchange="document.getElementById('file-name').textContent = this.files[0].name" required>
            </div>

            <button type="submit" name="upload_resource" class="btn btn-primary" style="width: 100%; padding: 12px; font-size: 1.1rem;">Upload Resource</button>
        </form>
        
        <div style="text-align: center;">
            <a href="v_tutor_home.php" class="cancel-link">&larr; Back to Dashboard</a>
        </div>
    </div>

</body>
</html>