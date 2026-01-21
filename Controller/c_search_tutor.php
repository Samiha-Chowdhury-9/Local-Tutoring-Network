<?php
require_once("../Model/m_tutor.php");

$key = "";
if (isset($_POST['search_key'])) {
    $key = $_POST['search_key'];
    $tutors = searchTutor($key);
} else {
    $tutors = getAllTutors();
}

if (!empty($tutors)) {
    echo "<table border='1' width='100%' cellspacing='0' cellpadding='10'>";
    echo "<tr><th>Name</th><th>Subject</th><th>Experience</th><th>Action</th></tr>";
    
    foreach ($tutors as $tutor) {
        echo "<tr>";
        echo "<td>" . $tutor['username'] . "</td>";
        echo "<td>" . $tutor['subjects'] . "</td>";
        echo "<td>" . $tutor['experience'] . "</td>";
        echo "<td><a href='v_book_tsession.php?tutor_id=" . $tutor['id'] . "'>Book Now</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No tutors found matching '" . $key . "'";
}
?>