<?php
session_start();
session_unset();
session_destroy();
header("Location: v_home.php");
exit();
?>