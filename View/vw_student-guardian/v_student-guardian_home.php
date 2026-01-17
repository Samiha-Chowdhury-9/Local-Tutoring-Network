<?php
session_start();
 if(empty($_SESSION['name']) || strtolower($_SESSION['role']) != 'student-guardian')
{
    header("Location: ../v_login.php");
    exit();
}
?>
<!doctype html>
<html>
    <head>
        <title>Student/Guardian Dashboard</title>
    <link rel="stylesheet" href="v_student-guardian_style.css">
    </head>
    <body>
    <p>Logged in as: <b>Student / Guardian</b></p>
    <hr>
      <h3>Dashboard Menu:</h3>
        <button onclick="location.href='v_search_tutor.php'">Search Tutor</button> 
        <br><br>
        <button onclick="location.href='v_book_tsession.php'">Book a Session</button> 
        <br><br>
        <button onclick="location.href='v_resourses.php'">View Resources</button> 
        <br><br>
        <button onclick="location.href='v_my_bookings.php'">My Booking History</button> 
        <br><br><hr>
        <button onclick="location.href='../v_logout.php'">Logout</button>

    </body>
</html>