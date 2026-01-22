<?php

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login - Local Tutoring Network</title>
        <link rel="stylesheet" href="v_css/loginStyle.css">
    </head>
    <body>
        <header>
            <h1>Login</h1>
        </header>

        <main>
            <div class="login-container">
                <form action="../Controller/c_authentication.php" method="POST">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" placeholder="Enter Username" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Enter Password" required>
                    </div>
                    
                    <br>
                    <button type="submit" class="btn">Login</button>
                </form>

                <div class="message-box">
                    <p class="error"><?php if(isset($_GET['error'])) echo $_GET['error']; ?></p>
                    <p class="success"><?php if(isset($_GET['success'])) echo $_GET['success']; ?></p>
                </div>

                <br>
                <a href="v_home.php" class="back-link">Back Home</a>
            </div>
        </main>

        <footer>
                <p><b>Local Tutoring Network</b></p>
                <p>Contact: support@proton.com | +88014324728</p>
                <p>© 2026 All Rights Reserved.</p>
        </footer>
    </body>
</html>