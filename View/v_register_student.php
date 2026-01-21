<!DOCTYPE html>
<html>
<head>
    <title>Register Student</title>
    <link rel="stylesheet" href="v_css/common.css">
</head>
<body>
    <h2>Student Registration</h2>
    <form action="../Controller/c_registration.php" method="POST">
        Username
        <input type="text" name="username" id="username" onkeyup="checkUsername()" required>
        <span id="username_msg"></span>
        <br>

        Email
        <input type="email" name="email" required>
        
        Password
        <input type="password" name="password" required>
        
        Confirm Password
        <input type="password" name="confirm_password" placeholder="Re-type Password" required>
        
        <h4>Profile Details</h4>
        Education Background
        <input type="text" name="education_background" required>
        Current Institution
        <input type="text" name="institution" required>
        Location
        <input type="text" name="location" required>
        
        <br>
        <button type="submit" name="reg_student" id="submitBtn">Register</button>
    </form>
    <p class="error"><?php if(isset($_GET['error'])) echo $_GET['error']; ?></p>
    <a href="v_home.php">Back Home</a>

    <script>
        function checkUsername() {
            var username = document.getElementById('username').value;
            var msgSpan = document.getElementById('username_msg');
            var submitBtn = document.getElementById('submitBtn');

            if (username.length === 0) {
                msgSpan.innerHTML = "";
                return;
            }

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../Controller/c_check_username.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    try {
                        var response = JSON.parse(xhr.responseText);
                        msgSpan.innerHTML = response.message;
                        if (response.status === "taken") {
                            msgSpan.style.color = "red";
                            submitBtn.disabled = true;
                        } else {
                            msgSpan.style.color = "green";
                            submitBtn.disabled = false;
                        }
                    } catch (e) {}
                }
            };
            xhr.send("username=" + username);
        }
    </script>
</body>
</html>