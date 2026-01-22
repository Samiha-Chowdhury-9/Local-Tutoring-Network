<?php
require_once("../Model/m_profiles.php");
$allSubjects = getAllSubjects();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register Tutor - Local Tutoring Network</title>
    <link rel="stylesheet" href="v_css/registerStyle.css">
    <script src="v_js/v_register_tutor.js" defer></script>
</head>
<body>
    <header>
        <h1>Tutor Registration</h1>
    </header>

    <main>
        <div class="register-container">
            <form action="../Controller/c_registration.php" method="POST">
                
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" id="username" onkeyup="checkUsername()" placeholder="Enter Username">
                    <span id="username_msg"></span>
                    <?php if(isset($_GET['usernameErr'])) echo "<span class='error-text'>".$_GET['usernameErr']."</span>"; ?>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email">
                    <?php if(isset($_GET['emailErr'])) echo "<span class='error-text'>".$_GET['emailErr']."</span>"; ?>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password">
                    <?php if(isset($_GET['passErr'])) echo "<span class='error-text'>".$_GET['passErr']."</span>"; ?>
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" placeholder="Re-type Password">
                    <?php if(isset($_GET['confirmErr'])) echo "<span class='error-text'>".$_GET['confirmErr']."</span>"; ?>
                </div>

                <h4>Professional Details</h4>
                
                <div class="form-group">
                    <label>Hourly Rate (Tk)</label>
                    <input type="number" name="hourly_rate" placeholder="e.g. 500">
                    <?php if(isset($_GET['rateErr'])) echo "<span class='error-text'>".$_GET['rateErr']."</span>"; ?>
                </div>

                <div class="form-group">
                    <label>Education Background</label>
                    <input type="text" name="education_background">
                    <?php if(isset($_GET['eduErr'])) echo "<span class='error-text'>".$_GET['eduErr']."</span>"; ?>
                </div>

                <div class="form-group">
                    <label>Current Institution</label>
                    <input type="text" name="institution">
                    <?php if(isset($_GET['instErr'])) echo "<span class='error-text'>".$_GET['instErr']."</span>"; ?>
                </div>

                <div class="form-group">
                    <label>Experience</label>
                    <input type="text" name="experience" placeholder="e.g. 2 Years">
                    <?php if(isset($_GET['expErr'])) echo "<span class='error-text'>".$_GET['expErr']."</span>"; ?>
                </div>

                <div class="form-group">
                    <label>Subjects</label>
                    <div class="checkbox-group">
                        <?php foreach($allSubjects as $sub): ?>
                            <label class="checkbox-label">
                                <input type="checkbox" name="subjects[]" value="<?php echo $sub['subject_name']; ?>">
                                <?php echo $sub['subject_name']; ?>
                            </label>
                        <?php endforeach; ?>
                    </div>
                    <?php if(isset($_GET['subErr'])) echo "<span class='error-text'>".$_GET['subErr']."</span>"; ?>
                </div>

                <div class="form-group">
                    <label>Short Bio</label>
                    <textarea name="short_bio" rows="4" placeholder="About yourself..."></textarea>
                </div>
                
                <br>
                <button type="submit" name="reg_tutor" id="submitBtn" class="btn">Register</button>
            </form>
            
            <p class="error-text"><?php if(isset($_GET['globalErr'])) echo $_GET['globalErr']; ?></p>
            
            <br>
            <a href="v_home.php" class="back-link">Back Home</a>
        </div>
    </main>

    <footer>
        <p><b>Local Tutoring Network</b></p>
        <p>Contact: support@proton.com | +88014324728</p>
        <p>© 2026 All Rights Reserved.</p>    </footer>
</body>
</html>