<?php
session_start();
session_unset();
session_destroy();

header("Location: v_login.php");
exit();

?>