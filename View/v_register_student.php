<!DOCTYPE html>
<html>
<head>
    <title>Register Student</title>
    <link rel="stylesheet" href="v_css/registerStyle.css">
    <script src="v_js/v_register_student.js" defer></script>
</head>
<body>
    <h2>Student Registration</h2>
    
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
        
        <h4>Profile Details</h4>
        
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

        Location:
        <input type="text" name="location">
        <br>
        <?php if(isset($_GET['locErr'])) echo "<span class='error-text'>".$_GET['locErr']."</span><br>"; ?>
        <br>
        
        <button type="submit" name="reg_student" id="submitBtn">Register</button>
    </form>
    
    <p class="error-text"><?php if(isset($_GET['globalErr'])) echo $_GET['globalErr']; ?></p>
    
    <a href="v_home.php">Back Home</a>


</body>
</html>