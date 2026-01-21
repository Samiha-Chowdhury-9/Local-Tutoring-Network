<?php
session_start();
require_once("../../Model/m_feedback.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'tutor'){ 
    header("Location: ../v_login.php"); exit(); 
}

$tutor_id = $_SESSION['user_id'];
$reviews = getTutorReviews($tutor_id);
$avgRating = getAvgRating($tutor_id);
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Feedback</title>
    <link rel="stylesheet" href="../v_css/common.css">
    <style>
        .summary-box { 
            background-color: #f0f8ff; padding: 20px; width: 40%; margin: 20px auto; 
            border: 1px solid skyblue; border-radius: 10px; font-size: 1.2em;
        }
        .review-card {
            border: 1px solid #ddd; width: 60%; margin: 15px auto; padding: 15px; 
            text-align: left; background-color: #fff; box-shadow: 2px 2px 5px #eee;
        }
        .rating-star { color: orange; font-weight: bold; font-size: 1.2em; }
    </style>
</head>
<body>
    <h2>Student Feedback</h2>
    
    <div class="summary-box">
        <strong>Overall Rating</strong><br>
        <span style="font-size: 2em; font-weight: bold;"><?php echo $avgRating; ?> / 5.0</span>
        <br>
        <small>(Based on <?php echo count($reviews); ?> reviews)</small>
    </div>

    <hr>

    <h3>Recent Reviews</h3>

    <?php if(count($reviews) > 0): ?>
        <?php foreach($reviews as $r): ?>
            <div class="review-card">
                <div>
                    <span class="rating-star">
                        <?php echo str_repeat("★", $r['rating']); ?>
                        <?php echo str_repeat("☆", 5 - $r['rating']); ?>
                    </span>
                    <span style="float:right; color:gray; font-size:0.9em;">
                        <?php echo date("M d, Y", strtotime($r['created_at'])); ?>
                    </span>
                </div>
                
                <p><strong><?php echo $r['student_name']; ?></strong> said:</p>
                <p style="font-style: italic; color: #555;">
                    "<?php echo nl2br($r['comment']); ?>"
                </p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No reviews yet. Keep teaching!</p>
    <?php endif; ?>

    <br>
    <div style="text-align:center;">
        <button onclick="location.href='v_tutor_home.php'">Back to Dashboard</button>
    </div>
</body>
</html>