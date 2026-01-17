<!doctype html>
<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" href="v_css/loginStyle.css">
        <style>
            /* এরর মেসেজ লাল রঙে দেখানোর জন্য */
            .error { color: red; font-size: 14px; }
        </style>
    </head>
    <body>
        <h1>Login</h1>
        
        <form action="../Controller/c_authentication.php" method="POST">
            Name:
            <input type="text" id="name" name="name"> <br>
            <span class="error"><?php if(isset($_GET["nameErr"])){echo $_GET["nameErr"];}?></span>
            <br>

            Password:
            <input type="password" id="password" name="password"> <br>
            <span class="error"><?php if(isset($_GET["passErr"])){echo $_GET["passErr"];}?></span>
            <br>
           
            <input type="submit" name="submit" value="submit">
            <input type="reset" name="reset" value="reset">
        </form>

        <br>
        <span class="error">
            <?php if(isset($_GET["genErr"])){echo $_GET["genErr"];}?>
        </span>

    </body>
</html>