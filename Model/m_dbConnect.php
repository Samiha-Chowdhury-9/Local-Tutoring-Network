<?php

    $host="localhost";
    $user="root";
    $password="";
    $dbName="ltn";

    function dbConnect()
    {
        global $host;
        global $user;
        global $password;
        global $dbName;
        $conn=mysqli_connect($host, $user, $password, $dbName);

        if(!$conn)
        {
            echo mysqli_connect_error();
            //echo "not connected";
        }

        else
        {
            //echo "connection succefully establishe<br>";
            
            return $conn;
        }
    }

    

    

?>