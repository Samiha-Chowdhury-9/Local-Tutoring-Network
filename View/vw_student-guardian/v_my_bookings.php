<?php
session_start();
require_once("../../Model/m_booking.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'student-guardian'){ 
    header("Location: ../v_login.php"); exit(); 
}

$myBookings = getStudentBookings($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>My Bookings</title>
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

        details summary {
            cursor: pointer;
            color: var(--primary-color);
            font-weight: bold;
            padding: 5px 0;
            transition: color 0.3s ease;
        }

        details summary:hover {
            color: var(--primary-hover);
        }

        .rating-box { 
            margin-top: 10px; 
            border-top: 1px dashed var(--border-color); 
            padding-top: 15px; 
            background-color: var(--text-light);
            padding: 15px;
            border-radius: 5px;
            border: 1px solid var(--border-color);
        }
        
        .rating-box label {
            font-weight: bold;
            color: var(--primary-color);
            display: block;
            margin-bottom: 5px;
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
        <h2 class="header-title">My Scheduled Sessions</h2>
        
        <?php 
        if(isset($_GET['msg'])) echo "<p class='success' style='text-align:center;'>".htmlspecialchars($_GET['msg'])."</p>";
        if(isset($_GET['err'])) echo "<p class='error' style='text-align:center;'>".htmlspecialchars($_GET['err'])."</p>"; 
        ?>

        <table class="theme-table">
            <thead>
                <tr>
                    <th>Date & Time</th>
                    <th>Tutor Details</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($myBookings) > 0): ?>
                    <?php foreach($myBookings as $booking): ?>
                        <tr>
                            <td>
                                <strong><?php echo htmlspecialchars($booking['date']); ?></strong><br>
                                <span style="color: var(--text-muted); font-size: 0.9em;"><?php echo htmlspecialchars($booking['time_slot']); ?></span>
                            </td>
                            <td>
                                <strong><?php echo htmlspecialchars($booking['tutor_name']); ?></strong><br>
                                <span style="font-size: 0.9em;">Email: <?php echo htmlspecialchars($booking['tutor_email']); ?></span>
                            </td>
                            <td style="color: var(--success); font-weight: bold;">
                                Confirmed
                            </td>
                            <td>
                                <details>
                                    <summary>Rate this Tutor</summary>
                                    <div class="rating-box">
                                        <form action="../../Controller/c_feedback.php" method="POST" style="margin:0;">
                                            <input type="hidden" name="tutor_id" value="<?php echo htmlspecialchars($booking['tutor_id']); ?>">
                                            
                                            <label>Rating:</label>
                                            <select name="rating" required>
                                                <option value="5">★★★★★ (5)</option>
                                                <option value="4">★★★★☆ (4)</option>
                                                <option value="3">★★★☆☆ (3)</option>
                                                <option value="2">★★☆☆☆ (2)</option>
                                                <option value="1">★☆☆☆☆ (1)</option>
                                            </select>
                                            
                                            <label style="margin-top: 10px;">Review:</label>
                                            <textarea name="comment" placeholder="Write a review..." rows="2" required></textarea>
                                            
                                            <button type="submit" name="submit_review" class="btn btn-primary" style="width: 100%; margin-top: 10px;">Submit Review</button>
                                        </form>
                                    </div>
                                </details>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="4" style="text-align:center; font-style: italic;">You have not booked any sessions yet.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div style="text-align:center;">
            <a href="v_student-guardian_home.php" class="cancel-link">&larr; Back to Dashboard</a>
        </div>
    </div>
</body>
</html>