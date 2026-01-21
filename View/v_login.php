<?php

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="v_css/common.css">
</head>
<body>
    <h2>Login</h2>
    <form action="../Controller/c_authentication.php" method="POST">
        Username
        <input type="text" name="username" placeholder="Enter Username" required>
        Password
        <input type="password" name="password" placeholder="Enter Password" required>
        <br>
        <button type="submit">Login</button>
    </form>
    <p class="error"><?php if(isset($_GET['error'])) echo $_GET['error']; ?></p>
    <p class="success"><?php if(isset($_GET['success'])) echo $_GET['success']; ?></p>
    <a href="v_home.php">Back Home</a>
</body>
</html>