<?php

?>

<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="css/loginStyle.css">
    </head>
    <body>
        <form action="../Controller/c_authentication.php" method="GET">
            User Id:
            <input type="text" name="userId" placeholder="input your id here"><br>
            <span name="idErr"><?php if(isset($_GET["idErr"])){echo $_GET["idErr"];}?></span><br>
            Password:
            <input type="password" name="pass"><br>
            <span name="passErr"><?php if(isset($_GET["passErr"])){echo $_GET["passErr"];}?></span><br><br>
            <input type="submit" name="submit" value="submit">
            <input type="reset" name="reset" value="reset">



        </form>
        <span name="genErr"><?php if(isset($_GET["genErr"])){echo $_GET["genErr"];}?></span>

    </body>
</html>