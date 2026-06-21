<?php
session_start();
require_once("../../Model/m_profiles.php");
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){ 
    header("Location: ../v_login.php"); exit(); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit Profile</title>
    <!-- Corrected relative depth path to reach common.css -->
    <link rel="stylesheet" href="../../View/v_css/common.css?v=1.1">
    
    <style>
        body {
            padding-bottom: 40px;
        }
        
        .form-container {
            max-width: 500px; 
            margin-top: 3rem;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 5px;
        }
        
        .back-link {
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

    <div class="form-container">
        <h2 style="text-align: center; margin-bottom: 20px;">Edit Admin Profile</h2>
        
        <!-- Display error notifications dynamically if returned by controller -->
        <?php if(isset($_GET['error'])): ?>
            <p class="error" style="text-align: center;"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>

        <!-- FIXED ACTION: Directing route path toward your active c_profiles.php file -->
        <form action="../../Controller/c_profiles.php" method="POST">
            <div class="form-group">
                <label>Username:</label>
                <!-- Marked as readonly or disabled if you don't allow modifying database primary usernames -->
                <input type="text" name="username" value="<?php echo htmlspecialchars($_SESSION['username']); ?>" readonly style="background-color: #e9ecef; cursor: not-allowed;">
            </div>

            <div class="form-group">
                <label>Email Address:</label>
                <input type="email" name="email" required placeholder="Enter new email profile">
            </div>

            <!-- FIXED NAME: Changed to update_admin to hit the specific block in c_profiles.php -->
            <button type="submit" name="update_admin" class="btn btn-primary" style="width: 100%; padding: 0.75rem;">Save Changes</button>
        </form>

        <div style="text-align: center; margin-top: 25px;">
            <a href="v_admin_home.php" class="back-link">&larr; Back to Dashboard</a>
        </div>
    </div>

    <footer>
        <p>&copy; 2026 Local Tutoring Network</p>
    </footer>

</body>
</html>