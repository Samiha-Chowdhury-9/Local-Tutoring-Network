<?php

?>

<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="css/loginStyle.css">
    </head>
    <body>
        <form action="../Controller/c_authentication.php" method="GET">
            Name:
            <input type="text" id="name" name="name"><br>
            <span name="idErr"><?php if(isset($_GET["idErr"])){echo $_GET["idErr"];}?></span><br>
            Password:
            <input type="password" id="password" name="password"><br>
            <span name="passErr"><?php if(isset($_GET["passErr"])){echo $_GET["passErr"];}?></span><br>
             Role:
            <input type="checkbox" id="tutor" name="role" value="tutor">Tutor
            <input type="checkbox" id="student-guardian" name="role" value="student-guardian">Student/Guardian<br>
            <span name="roleErr"><?php if(isset($_GET["roleErr"])){echo $_GET["roleErr"];}?></span><br><br>

            <input type="submit" name="submit" value="submit">
            <input type="reset" name="reset" value="reset">



        </form>
        <span name="genErr"><?php if(isset($_GET["genErr"])){echo $_GET["genErr"];}?></span>

    </body>
</html>