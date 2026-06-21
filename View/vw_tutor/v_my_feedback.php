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
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>My Feedback</title>
    <link rel="stylesheet" href="../v_css/common.css?v=1.1">
    
    <style>
        body { padding-top: 40px; }

        .header-title {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid var(--border-color);
            padding-bottom: 10px;
        }

        /* Themed Summary Box */
        .summary-card { 
            background-color: var(--text-light); 
            border: 2px solid var(--primary-color); 
            padding: 20px; 
            width: 90%; 
            max-width: 400px; 
            margin: 20px auto; 
            border-radius: 8px; 
            text-align: center;
        }

        /* Themed Review Cards */
        .review-card {
            border: 1px solid var(--border-color); 
            width: 90%; 
            max-width: 600px; 
            margin: 15px auto; 
            padding: 20px; 
            background-color: var(--text-light); 
            border-radius: 6px;
        }

        .rating-star { color: #f1c40f; font-weight: bold; font-size: 1.2em; }
        
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
        <h2 class="header-title">Student Feedback</h2>
        
        <div class="summary-card">
            <strong>Overall Rating</strong><br>
            <span style="font-size: 2em; font-weight: bold; color: var(--primary-color);"><?php echo htmlspecialchars($avgRating); ?> / 5.0</span>
            <br>
            <small style="color: var(--text-muted);">(Based on <?php echo count($reviews); ?> reviews)</small>
        </div>

        <hr style="margin: 30px 0; border: 0; border-top: 2px solid var(--border-color);">

        <h3 style="text-align: center;">Recent Reviews</h3>

        <?php if(count($reviews) > 0): ?>
            <?php foreach($reviews as $r): ?>
                <div class="review-card">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                        <span class="rating-star">
                            <?php echo str_repeat("★", (int)$r['rating']); ?>
                            <?php echo str_repeat("☆", 5 - (int)$r['rating']); ?>
                        </span>
                        <span style="color:var(--text-muted); font-size:0.9em;">
                            <?php echo htmlspecialchars(date("M d, Y", strtotime($r['created_at']))); ?>
                        </span>
                    </div>
                    
                    <p><strong><?php echo htmlspecialchars($r['student_name']); ?></strong> said:</p>
                    <p style="font-style: italic; color: #555;">
                        "<?php echo nl2br(htmlspecialchars($r['comment'])); ?>"
                    </p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="text-align:center; font-style: italic; margin-top: 20px;">No reviews yet. Keep teaching!</p>
        <?php endif; ?>

        <div style="text-align:center; margin-top: 30px;">
            <a href="v_tutor_home.php" class="cancel-link">&larr; Back to Dashboard</a>
        </div>
    </div>
</body>
</html>