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
        table { width: 80%; margin: 20px auto; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        th { background-color: skyblue; }
    </style>
</head>
<body>
    <h2>My Scheduled Sessions</h2>
    
    <?php if(isset($_GET['msg'])) echo "<p style='color:green; text-align:center;'>".$_GET['msg']."</p>"; ?>

    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Tutor Name</th>
                <th>Tutor Email</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if(count($myBookings) > 0): ?>
                <?php foreach($myBookings as $booking): ?>
                    <tr>
                        <td><?php echo $booking['date']; ?></td>
                        <td><?php echo $booking['time_slot']; ?></td>
                        <td><?php echo $booking['tutor_name']; ?></td>
                        <td><?php echo $booking['tutor_email']; ?></td>
                        <td style="color:green; font-weight:bold;">Confirmed</td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5">You have no upcoming bookings.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <br>
    <div style="text-align:center;">
        <button onclick="location.href='v_student-guardian_home.php'">Back to Dashboard</button>
    </div>
</body>
</html>