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
        echo "<p style='color:red;'>No tutors found.</p>";
    }
}


if (isset($_POST['action']) && $_POST['action'] == 'view_profile') {
    $id = $_SESSION['user_id'];
    $data = getStudentInfo($id);

    $phone = isset($data['phone_number']) ? $data['phone_number'] : '';
    $address = isset($data['address']) ? $data['address'] : '';
    $institution = isset($data['institution']) ? $data['institution'] : '';
    $dob = isset($data['dob']) ? $data['dob'] : '';

    echo '<form id="profileForm">';
    echo 'Username: <br><input type="text" value="'.$data['username'].'" readonly disabled><br><br>';
    echo 'Email: <br><input type="email" value="'.$data['email'].'" readonly disabled><br><br>';
    echo 'Phone: <br><input type="text" id="phone" value="'.$phone.'"><br><br>';
    echo 'Address: <br><textarea id="address">'.$address.'</textarea><br><br>';
    echo 'Institution: <br><input type="text" id="institution" value="'.$institution.'"><br><br>';
    echo 'Date of Birth: <br><input type="date" id="dob" value="'.$dob.'"><br><br>';
    echo '<button type="button" onclick="updateProfile()">Update Profile</button>';
    echo '</form>';
    echo '<p id="msg" style="color:green;"></p>';
}


if (isset($_POST['action']) && $_POST['action'] == 'update_profile') {
    $id = $_SESSION['user_id'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $institution = $_POST['institution'];
    $dob = $_POST['dob'];

    if (updateStudentInfo($id, $phone, $address, $institution, $dob)) {
        echo "Profile Updated Successfully!";
    } else {
        echo "Failed to update profile.";
    }
}
?>