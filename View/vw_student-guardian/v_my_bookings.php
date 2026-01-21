<?php
session_start();
require_once("../../Model/m_booking.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'student-guardian'){ 
    header("Location: ../v_login.php"); exit(); 
}

$myBookings = getStudentBookings($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Bookings</title>
    <link rel="stylesheet" href="../v_css/common.css">
    <style>
        table { width: 95%; margin: 20px auto; border-collapse: collapse; background: white; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; vertical-align: top;}
        th { background-color: skyblue; text-align: center; }
        
        .rating-box { 
            margin-top: 10px; 
            border-top: 1px dashed #ccc; 
            padding-top: 10px; 
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
        }
        .btn-rate { background-color: orange; color: black; border: 1px solid #ccc; cursor: pointer; }
    </style>
</head>
<body>
    <h2>My Scheduled Sessions</h2>
    
    <?php 
    if(isset($_GET['msg'])) echo "<p style='color:green; text-align:center;'>".$_GET['msg']."</p>";
    if(isset($_GET['err'])) echo "<p style='color:red; text-align:center;'>".$_GET['err']."</p>"; 
    ?>

    <table>
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
                        <td align="center">
                            <strong><?php echo $booking['date']; ?></strong><br>
                            <span style="color:gray"><?php echo $booking['time_slot']; ?></span>
                        </td>
                        <td>
                            <strong><?php echo $booking['tutor_name']; ?></strong><br>
                            Email: <?php echo $booking['tutor_email']; ?>
                        </td>
                        <td style="color:green; font-weight:bold; text-align:center;">
                            Confirmed
                        </td>
                        <td>
                            <details>
                                <summary style="cursor:pointer; color:blue; font-weight:bold;">Rate this Tutor</summary>
                                <div class="rating-box">
                                    <form action="../../Controller/c_feedback.php" method="POST">
                                        <input type="hidden" name="tutor_id" value="<?php echo $booking['tutor_id']; ?>">
                                        
                                        <label>Rating:</label>
                                        <select name="rating" required>
                                            <option value="5">★★★★★ (5)</option>
                                            <option value="4">★★★★ (4)</option>
                                            <option value="3">★★★ (3)</option>
                                            <option value="2">★★ (2)</option>
                                            <option value="1">★ (1)</option>
                                        </select>
                                        <br><br>
                                        <textarea name="comment" placeholder="Write a review..." rows="2" style="width:90%;" required></textarea>
                                        <br><br>
                                        <button type="submit" name="submit_review" class="btn-rate">Submit Review</button>
                                    </form>
                                </div>
                            </details>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="4" style="text-align:center;">You have not booked any sessions yet.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <br>
    <div style="text-align:center;">
        <button onclick="location.href='v_student-guardian_home.php'">Back to Dashboard</button>
    </div>
</body>
</html>