<?php
session_start();
require_once("../Model/m_tutor.php");
require_once("../Model/m_student.php");


if (isset($_POST['action']) && $_POST['action'] == 'show_all_tutors') {
    $tutors = getAllTutors();

    if (!empty($tutors)) {
        echo "<table border='1' width='100%' cellspacing='0' cellpadding='10'>";
        echo "<tr><th>Name</th><th>Subject</th><th>Experience</th><th>Action</th></tr>";
        
        foreach ($tutors as $tutor) {
            echo "<tr>";
            echo "<td>" . $tutor['username'] . "</td>";
            echo "<td>" . $tutor['subjects'] . "</td>";
            echo "<td>" . $tutor['experience'] . "</td>";
            echo "<td><a href='v_book_tsession.php?tutor_id=" . $tutor['id'] . "'>Book Session</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='color:red;'>No tutors found at the moment.</p>";
    }
}


if (isset($_POST['action']) && $_POST['action'] == 'view_profile') {
    $id = $_SESSION['user_id'];
    $data = getStudentInfo($id);

    
    $email = isset($data['email']) ? $data['email'] : '';
    $edu = isset($data['education_background']) ? $data['education_background'] : '';
    $inst = isset($data['institution']) ? $data['institution'] : '';
    $loc = isset($data['location']) ? $data['location'] : '';

    echo '<h3>My Profile</h3>';
    echo '<form id="profileForm">';
    echo 'Username: <br><input type="text" value="'.$data['username'].'" readonly disabled><br><br>';
    
    echo 'Email: <br><input type="email" id="email" value="'.$email.'"><br><br>';
    echo 'Education: <br><input type="text" id="education_background" value="'.$edu.'"><br><br>';
    echo 'Institution: <br><input type="text" id="institution" value="'.$inst.'"><br><br>';
    echo 'Location: <br><input type="text" id="location" value="'.$loc.'"><br><br>';
    
    echo '<button type="button" onclick="updateProfile()">Update Profile</button>';
    echo '</form>';
    echo '<p id="msg" style="color:green;"></p>';
}


if (isset($_POST['action']) && $_POST['action'] == 'update_profile') {
    $id = $_SESSION['user_id'];
    $email = $_POST['email'];
    $edu = $_POST['education_background'];
    $inst = $_POST['institution'];
    $loc = $_POST['location'];

    if (updateStudentInfo($id, $email, $edu, $inst, $loc)) {
        echo "Profile Updated Successfully!";
    } else {
        echo "Failed to update profile.";
    }
}
?>