<?php
session_start();
require_once("../../Model/m_session.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'tutor'){ 
    header("Location: ../v_login.php"); exit(); 
}

$mySlots = getTutorSlots($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Schedule</title>
    <link rel="stylesheet" href="../v_css/common.css">
    <style>
        .container { width: 80%; margin: 20px auto; text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; }
        th { background-color: skyblue; }
        .available { color: green; font-weight: bold; }
        .booked { color: red; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Manage My Schedule</h2>
        
        <?php 
        if(isset($_GET['msg'])) echo "<p style='color:green'>".$_GET['msg']."</p>";
        if(isset($_GET['err'])) echo "<p style='color:red'>".$_GET['err']."</p>"; 
        ?>

        <form action="../../Controller/c_session.php" method="POST" style="border:1px solid #ccc; padding:20px; width:50%; margin:0 auto;">
            <h3>Add New Availability</h3>
            <label>Date:</label>
            <input type="date" name="date" required min="<?php echo date('Y-m-d'); ?>">
            
            <label>Time:</label>
            <select name="time_slot" style="display:block; margin:10px auto; padding:8px; width:266px;">
                <option value="09:00 AM">09:00 AM</option>
                <option value="10:00 AM">10:00 AM</option>
                <option value="11:00 AM">11:00 AM</option>
                <option value="02:00 PM">02:00 PM</option>
                <option value="03:00 PM">03:00 PM</option>
                <option value="04:00 PM">04:00 PM</option>
                <option value="05:00 PM">05:00 PM</option>
                <option value="07:00 PM">07:00 PM</option>
                <option value="08:00 PM">08:00 PM</option>
            </select>
            
            <button type="submit" name="add_slot" style="background-color:green; color:white;">Add Slot</button>
        </form>

        <hr>

        <h3>My Upcoming Slots</h3>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($mySlots) > 0): ?>
                    <?php foreach($mySlots as $slot): ?>
                        <tr>
                            <td><?php echo $slot['date']; ?></td>
                            <td><?php echo $slot['time_slot']; ?></td>
                            <td class="<?php echo $slot['status']; ?>"><?php echo ucfirst($slot['status']); ?></td>
                            <td>
                                <?php if($slot['status'] == 'available'): ?>
                                    <form action="../../Controller/c_session.php" method="POST">
                                        <input type="hidden" name="slot_id" value="<?php echo $slot['id']; ?>">
                                        <button type="submit" name="delete_slot" style="background-color:red; color:white; padding:5px;">Remove</button>
                                    </form>
                                <?php else: ?>
                                    <span>Booked (Cannot Delete)</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="4">No slots added yet.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
        
        <br>
        <button onclick="location.href='v_tutor_home.php'">Back to Dashboard</button>
    </div>
</body>
</html>