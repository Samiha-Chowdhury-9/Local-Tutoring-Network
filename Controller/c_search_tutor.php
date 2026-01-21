<?php
session_start();
require_once("../Model/m_tutor.php");

$key = isset($_POST['search_query']) ? $_POST['search_query'] : "";

if (!empty($key)) {
    $tutors = searchTutor($key);
} else {
    $tutors = getAllTutors();
}

if (!empty($tutors)) {
    echo "<table class='tutor-table'>";
    echo "<tr>
            <th>Name</th>
            <th>Subject</th>
            <th>Experience</th>
            <th>Action</th>
          </tr>";
    
    foreach ($tutors as $tutor) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($tutor['username']) . "</td>";
        echo "<td>" . htmlspecialchars($tutor['subjects']) . "</td>";
        echo "<td>" . htmlspecialchars($tutor['experience']) . "</td>";
        echo "<td>
                <a href='v_book_tsession.php?tutor_id=" . $tutor['id'] . "' class='book-btn'>Book Session</a>
              </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p style='color:red; text-align:center;'>No tutors found matching '" . htmlspecialchars($key) . "'</p>";
}
?>