<?php
require_once("m_dbConnect.php");


function addReview($tutor_id, $student_id, $rating, $comment) {
    $conn = dbConnect();

    $safeComment = mysqli_real_escape_string($conn, $comment);
    
    $sql = "INSERT INTO reviews (tutor_id, student_id, rating, comment) 
            VALUES ('$tutor_id', '$student_id', '$rating', '$safeComment')";
            
    return mysqli_query($conn, $sql);
}

function getTutorReviews($tutor_id) {
    $conn = dbConnect();
    $sql = "SELECT r.*, u.username as student_name 
            FROM reviews r 
            JOIN users u ON r.student_id = u.id 
            WHERE r.tutor_id = '$tutor_id' 
            ORDER BY r.created_at DESC";
    $result = mysqli_query($conn, $sql);
    
    $reviews = [];
    while($row = mysqli_fetch_assoc($result)) {
        $reviews[] = $row;
    }
    return $reviews;
}

function getAvgRating($tutor_id) {
    $conn = dbConnect();
    $sql = "SELECT AVG(rating) as avg_rating FROM reviews WHERE tutor_id='$tutor_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return round($row['avg_rating'], 1); 
}
?>