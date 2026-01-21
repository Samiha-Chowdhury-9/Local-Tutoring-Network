<?php
session_start();
require_once("../../Model/m_booking.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'student-guardian'){ 
    header("Location: ../v_login.php"); exit(); 
}

if(!isset($_GET['tutor_id'])) {
    header("Location: v_student-guardian_home.php"); exit();
}

$tutor_id = $_GET['tutor_id'];
$slots = getAvailableSlots($tutor_id);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Book Session</title>
    <link rel="stylesheet" href="../v_css/common.css">
    <style>
        .slot-card {
            border: 1px solid #ddd; padding: 15px; margin: 10px auto; width: 50%;
            background-color: #f9f9f9; display: flex; justify-content: space-between; align-items: center;
        }
        .btn-book { background-color: #28a745; color: white; padding: 10px 20px; text-decoration: none; border:none; cursor:pointer;}
        .btn-book:hover { background-color: #218838; }
    </style>
</head>
<body>
    <h2>Available Slots</h2>
    <p style="text-align:center;">Select a time to book your session.</p>

    <?php if(isset($_GET['err'])) echo "<p style='color:red; text-align:center;'>".$_GET['err']."</p>"; ?>

    <?php if(count($slots) > 0): ?>
        <?php foreach($slots as $slot): ?>
            <div class="slot-card">
                <div>
                    <strong>Date:</strong> <?php echo $slot['date']; ?> <br>
                    <strong>Time:</strong> <?php echo $slot['time_slot']; ?>
                </div>
                <form action="../../Controller/c_booking.php" method="POST">
                    <input type="hidden" name="slot_id" value="<?php echo $slot['id']; ?>">
                    <input type="hidden" name="tutor_id" value="<?php echo $tutor_id; ?>">
                    <button type="submit" name="book_slot" class="btn-book" onclick="return confirm('Confirm booking?');">Book Now</button>
                </form>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p style="text-align:center;">This tutor has no available slots right now.</p>
    <?php endif; ?>

    <br>
    <div style="text-align:center;">
        <button onclick="location.href='v_student-guardian_home.php'">Back to Search</button>
    </div>
</body>
</html>