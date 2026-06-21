<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location: ../v_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Student Dashboard</title>
    
    <link rel="stylesheet" href="../v_css/common.css?v=1.1">
    
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            background-color: lightcyan;
            font-family: sans-serif;
        }
        
        .welcome-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .welcome-title {
            background-color: rgb(25, 93, 119);
            color: white;
            padding: 15px 40px;
            border: 2px solid darkblue;
            border-radius: 5px;
            margin: 0;
            font-size: 28px;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.2);
        }

        .dashboard-menu-container {
            width: 100%;
            max-width: 350px;
            background-color: lightblue;
            padding: 30px;
            border-radius: 8px;
            border: 2px solid darkblue;
            box-shadow: 2px 2px 8px rgba(0,0,0,0.15);
            text-align: center;
        }

        .dashboard-menu-container h3 {
            color: rgb(25, 93, 119);
            margin-top: 0;
            border-bottom: 2px solid darkblue;
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-size: 22px;
        }

        .nav-btn {
            display: block;
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            background-color: white;
            color: black;
            border: 2px solid darkblue;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            box-sizing: border-box;
            transition: background-color 0.3s, color 0.3s;
        }

        .nav-btn:hover {
            background-color: darkcyan;
            color: lightcyan;
        }

        .btn-logout {
            background-color: #607d8b; 
            color: white;
            border-color: #455a64;
            margin-top: 25px;
        }

        .btn-logout:hover {
            background-color: #455a64; 
            color: white;
        }
    </style>
</head>
<body>

    <div class="welcome-header">
        <h2 class="welcome-title">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
    </div>
    
    <div class="dashboard-menu-container">
        <h3>Dashboard Menu</h3>
        
        <a href="v_student-guardian_profile.php" class="nav-btn">My Profile</a>
        <a href="v_search_tutor.php" class="nav-btn">Search Tutor</a>
        <a href="v_my_bookings.php" class="nav-btn">My Bookings</a>
        <a href="v_resourses.php" class="nav-btn">Resources</a>
        
        <a href="../v_logout.php" class="nav-btn btn-logout">Logout</a>
    </div>

</body>
</html>