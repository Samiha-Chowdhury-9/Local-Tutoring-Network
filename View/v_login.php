<?php

?>

<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="v_css/loginStyle.css">
    </head>
    <body>
        <form action="../Controller/c_authentication.php" method="POST">
            Name:
            <input type="text" id="name" name="name"><br>
            <span name="nameErr"><?php if(isset($_POST["nameErr"])){echo $_POST["nameErr"];}?></span><br>
            Password:
            <input type="password" id="password" name="password"><br>
            <span name="passErr"><?php if(isset($_POST["passErr"])){echo $_POST["passErr"];}?></span><br>
           
            <input type="submit" name="submit" value="submit">
            <input type="reset" name="reset" value="reset">
        </form>

        <span name="genErr"><?php if(isset($_POST["genErr"])){echo $_POST["genErr"];}?></span>

    </body>
</html>