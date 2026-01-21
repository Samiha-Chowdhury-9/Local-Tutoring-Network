<?php

?>

<!DOCTYPE html>
<html>
<head>
    <title>Register Tutor</title>
    <link rel="stylesheet" href="v_css/registerStyle.css">
    <script src="v_js/v_register_tutor.js"></script>
</head>
<body>
    <h2>Tutor Registration</h2>
    <form action="../Controller/c_registration.php" method="POST">
        Username
        <input type="text" name="username" id="username" onkeyup="checkUsername()" placeholder="Enter Username" required>
        <span id="username_msg"></span><br><br>

        Email
        <input type="email" name="email" required><br><br>
        
        Password
        <input type="password" name="password" required><br><br>
        
        Confirm Password
        <input type="password" name="confirm_password" placeholder="Re-type Password" required><br>

        <h4>Professional Details</h4>
        Education Background
        <input type="text" name="education_background" required><br><br>
        Current Institution
        <input type="text" name="institution" required><br><br>
        Experience
        <input type="text" name="experience" placeholder="e.g. 2 Years" required><br><br>
        Subjects
        <input type="text" name="subjects" placeholder="Math, English" required><br><br>
        Short Bio
        <textarea name="short_bio" rows="4" placeholder="About yourself..."></textarea><br><br>
        
        <br>
        <button type="submit" name="reg_tutor" id="submitBtn">Register</button>
    </form>
    <p class="error"><?php if(isset($_GET['error'])) echo $_GET['error']; ?></p>
    <a href="v_home.php">Back Home</a>

    
</body>
</html>