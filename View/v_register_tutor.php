<?php

require_once("../Model/m_profiles.php");
$allSubjects = getAllSubjects();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register Tutor</title>
    <link rel="stylesheet" href="v_css/registerStyle.css">
    <script src="v_js/v_register_tutor.js" defer></script>

</head>
<body>
    <h2>Tutor Registration</h2>
    
    <form action="../Controller/c_registration.php" method="POST">
        
        Username:
        <input type="text" name="username" id="username" onkeyup="checkUsername()" placeholder="Enter Username">
        <span id="username_msg"></span>
        <br>
        <?php if(isset($_GET['usernameErr'])) echo "<span class='error-text'>".$_GET['usernameErr']."</span><br>"; ?>
        <br>

        Email:
        <input type="text" name="email">
        <br>
        <?php if(isset($_GET['emailErr'])) echo "<span class='error-text'>".$_GET['emailErr']."</span><br>"; ?>
        <br>

        Password:
        <input type="password" name="password">
        <br>
        <?php if(isset($_GET['passErr'])) echo "<span class='error-text'>".$_GET['passErr']."</span><br>"; ?>
        <br>

        Confirm Password:
        <input type="password" name="confirm_password" placeholder="Re-type Password">
        <br>
        <?php if(isset($_GET['confirmErr'])) echo "<span class='error-text'>".$_GET['confirmErr']."</span><br>"; ?>
        <br>

        <h4>Professional Details</h4>
        
        Hourly Rate (Tk):
        <input type="number" name="hourly_rate" placeholder="e.g. 500">
        <br>
        <?php if(isset($_GET['rateErr'])) echo "<span class='error-text'>".$_GET['rateErr']."</span><br>"; ?>
        <br>

        Education Background:
        <input type="text" name="education_background">
        <br>
        <?php if(isset($_GET['eduErr'])) echo "<span class='error-text'>".$_GET['eduErr']."</span><br>"; ?>
        <br>

        Current Institution:
        <input type="text" name="institution">
        <br>
        <?php if(isset($_GET['instErr'])) echo "<span class='error-text'>".$_GET['instErr']."</span><br>"; ?>
        <br>

        Experience:
        <input type="text" name="experience" placeholder="e.g. 2 Years">
        <br>
        <?php if(isset($_GET['expErr'])) echo "<span class='error-text'>".$_GET['expErr']."</span><br>"; ?>
        <br>

        Subjects:
        <div class="checkbox-group">
            <?php foreach($allSubjects as $sub): ?>
                <input type="checkbox" name="subjects[]" value="<?php echo $sub['subject_name']; ?>">
                <label><?php echo $sub['subject_name']; ?></label><br>
            <?php endforeach; ?>
        </div>
        <br>
        <?php if(isset($_GET['subErr'])) echo "<span class='error-text'>".$_GET['subErr']."</span><br>"; ?>
        <br>

        Short Bio:
        <textarea name="short_bio" rows="4" placeholder="About yourself..."></textarea>
        <br><br>
        
        <button type="submit" name="reg_tutor" id="submitBtn">Register</button>
    </form>
    
    <p class="error-text"><?php if(isset($_GET['globalErr'])) echo $_GET['globalErr']; ?></p>
    
    <a href="v_home.php">Back Home</a>

</body>
</html>