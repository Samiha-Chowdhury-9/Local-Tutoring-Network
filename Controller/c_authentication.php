<?php
session_start();
require_once("../Model/m_user.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = authUser($username, $password);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] == 'admin') header("Location: ../View/vw_admin/v_admin_home.php");
        elseif ($user['role'] == 'tutor') header("Location: ../View/vw_tutor/v_tutor_home.php");
        elseif ($user['role'] == 'student-guardian') header("Location: ../View/vw_student-guardian/v_student-guardian_home.php");
    } else {
        header("Location: ../View/v_login.php?error=Invalid Credentials");
    }
}
?>