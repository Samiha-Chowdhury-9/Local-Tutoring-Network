<?php
require_once("m_dbConnect.php");

function getAllTutors() {
    $conn = dbConnect();
    $sql = "SELECT u.id, u.username, u.email, tp.subjects, tp.experience, tp.education_background 
            FROM users u 
            JOIN tutor_profiles tp ON u.id = tp.user_id 
            WHERE u.role = 'tutor'";
            
    $result = mysqli_query($conn, $sql);
    $tutors = [];

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $tutors[] = $row;
        }
    }
    return $tutors;
}
?>