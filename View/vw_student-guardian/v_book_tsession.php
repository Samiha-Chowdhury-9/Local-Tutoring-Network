<?php
session_start();
require_once("../../Model/m_booking.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'student-guardian'){ 
    header("Location: ../v_login.php"); exit(); 
}

// Redirect back to search instead of home if no tutor_id is provided
if(!isset($_GET['tutor_id'])) {
    header("Location: v_search_tutor.php"); exit();
}

$tutor_id = $_GET['tutor_id'];
$slots = getAvailableSlots($tutor_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Book Session</title>
    <link rel="stylesheet" href="../v_css/common.css?v=1.1">
    
    <style>
        body {
            padding-top: 40px; 
        }

        .header-title {
            text-align: center;
            margin-bottom: 10px;
            border-bottom: 2px solid var(--border-color);
            padding-bottom: 10px;
        }

        .slot-card {
            border: 2px solid var(--border-color); 
            padding: 15px 20px; 
            margin: 15px auto; 
            width: 100%;
            max-width: 500px;
            background-color: var(--text-light); /* White background inside card */
            display: flex; 
            justify-content: space-between; 
            align-items: center;
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .slot-info strong {
            color: var(--primary-color);
        }

        /* Distinct green booking button */
        .btn-book { 
            background-color: #27ae60; 
            color: white; 
            border-color: #1e8449;
            padding: 8px 15px;
        }
        
        .btn-book:hover { 
            background-color: #1e8449; 
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
    <div class="dashboard-container">
        <h2 class="header-title">Available Slots</h2>
        <p style="text-align:center; color: #444; margin-bottom: 25px;">Select a time to book your session.</p>

        <?php if(isset($_GET['err'])): ?>
            <p class="error" style="text-align:center;"><?php echo htmlspecialchars($_GET['err']); ?></p>
        <?php endif; ?>

        <?php if(count($slots) > 0): ?>
            <?php foreach($slots as $slot): ?>
                <div class="slot-card">
                    <div class="slot-info">
                        <strong>Date:</strong> <?php echo htmlspecialchars($slot['date']); ?> <br>
                        <strong>Time:</strong> <?php echo htmlspecialchars($slot['time_slot']); ?>
                    </div>
                    <form action="../../Controller/c_booking.php" method="POST" style="margin:0;">
                        <input type="hidden" name="slot_id" value="<?php echo htmlspecialchars($slot['id']); ?>">
                        <input type="hidden" name="tutor_id" value="<?php echo htmlspecialchars($tutor_id); ?>">
                        <button type="submit" name="book_slot" class="btn btn-book" onclick="return confirm('Confirm booking?');">Book Now</button>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="text-align:center; font-style:italic; color: #555;">This tutor has no available slots right now.</p>
        <?php endif; ?>

        <div style="text-align:center; margin-top: 30px;">
            <a href="v_search_tutor.php" class="cancel-link">&larr; Back to Search</a>
        </div>
    </div>
</body>
</html>