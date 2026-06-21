<?php
session_start();
require_once("../../Model/m_session.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'tutor'){ 
    header("Location: ../v_login.php"); exit(); 
}

$mySlots = getTutorSlots($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Manage Schedule</title>
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

        .add-slot-card {
            background-color: rgba(25, 93, 119, 0.08); 
            border: 2px solid var(--primary-color); 
            padding: 25px 30px;
            border-radius: 8px;
            max-width: 400px;
            margin: 0 auto 30px auto;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1); 
        }

        .add-slot-card h3 {
            text-align: center;
            margin-top: 0;
            font-size: 1.3rem;
            color: var(--primary-color);
            border-bottom: 2px solid rgba(25, 93, 119, 0.2); 
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 5px;
        }

        .available { color: var(--success); font-weight: bold; }
        .booked { color: var(--danger); font-weight: bold; }

        .btn-remove {
            background-color: #607d8b; 
            color: white;
            border-color: #455a64;
            padding: 6px 12px;
            font-size: 14px;
        }

        .btn-remove:hover {
            background-color: #455a64;
            color: white;
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
        <h2 class="header-title">Manage My Schedule</h2>
        
        <?php 
        if(isset($_GET['msg'])) echo "<p class='success' style='text-align:center;'>".htmlspecialchars($_GET['msg'])."</p>";
        if(isset($_GET['err'])) echo "<p class='error' style='text-align:center;'>".htmlspecialchars($_GET['err'])."</p>"; 
        ?>

        <div class="add-slot-card">
            <h3>Add New Availability</h3>
            <form action="../../Controller/c_session.php" method="POST" style="margin:0;">
                <div class="form-group">
                    <label>Date:</label>
                    <input type="date" name="date" required min="<?php echo date('Y-m-d'); ?>">
                </div>
                
                <div class="form-group">
                    <label>Time:</label>
                    <select name="time_slot" required>
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
                </div>
                
                <button type="submit" name="add_slot" class="btn btn-primary" style="width:100%; margin-top:10px;">Add Slot</button>
            </form>
        </div>

        <hr style="border: 0; border-top: 2px solid var(--border-color); margin: 30px 0;">

        <h3 style="text-align:center; margin-bottom: 15px;">My Upcoming Slots</h3>
        <table class="theme-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($mySlots) > 0): ?>
                    <?php foreach($mySlots as $slot): ?>
                        <tr>
                            <td><strong><?php echo htmlspecialchars($slot['date']); ?></strong></td>
                            <td><?php echo htmlspecialchars($slot['time_slot']); ?></td>
                            <td class="<?php echo htmlspecialchars($slot['status']); ?>"><?php echo ucfirst(htmlspecialchars($slot['status'])); ?></td>
                            <td style="text-align: center;">
                                <?php if($slot['status'] == 'available'): ?>
                                    <form action="../../Controller/c_session.php" method="POST" style="margin:0;">
                                        <input type="hidden" name="slot_id" value="<?php echo htmlspecialchars($slot['id']); ?>">
                                        <button type="submit" name="delete_slot" class="btn btn-remove" onclick="return confirm('Are you sure you want to remove this available slot?');">Remove</button>
                                    </form>
                                <?php else: ?>
                                    <span style="color: var(--text-muted); font-style: italic;">Booked (Cannot Delete)</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="4" style="text-align:center; font-style: italic; color: #555;">No slots added yet.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
        
        <div style="text-align:center;">
            <a href="v_tutor_home.php" class="cancel-link">&larr; Back to Dashboard</a>
        </div>
    </div>
</body>
</html>