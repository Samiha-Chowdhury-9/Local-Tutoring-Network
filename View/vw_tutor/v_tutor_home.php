<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'tutor'){ header("Location: ../v_login.php"); exit(); }
?>
<h1>Tutor Dashboard</h1>
Welcome <?php echo $_SESSION['username']; ?>
<br><br>
<a href="../v_logout.php">Logout</a>