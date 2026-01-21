<?php
require_once("../Model/m_tutor.php");

if (isset($_POST['action']) && $_POST['action'] == 'show_all_tutors') {
    
    $tutors = getAllTutors();

    if (!empty($tutors)) {
        echo "<table border='1' width='100%' cellspacing='0' cellpadding='10'>";
        echo "<tr>
                <th>Name</th>
                <th>Subject</th>
                <th>Experience</th>
                <th>Action</th>
              </tr>";
        
        foreach ($tutors as $tutor) {
            echo "<tr>";
            echo "<td>" . $tutor['username'] . "</td>";
            echo "<td>" . $tutor['subjects'] . "</td>";
            echo "<td>" . $tutor['experience'] . "</td>";
            echo "<td>
                    <a href='v_book_tsession.php?tutor_id=" . $tutor['id'] . "'>Book Session</a>
                  </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='color:red;'>No tutors found at the moment.</p>";
    }
}
?>