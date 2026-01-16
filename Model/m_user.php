<?php
    require_once("m_dbConnect.php");

    function authUser($name, $pass)
    {
        $query="SELECT * FROM users WHERE Name='$name' AND Password='$pass'";
        $conn=dbConnect();
        $data=mysqli_query($conn, $query);
        $users="";
        if(mysqli_num_rows($data)>0)
        {
            while($rows=mysqli_fetch_assoc($data))
            {
                $users=$rows;
            }
        }

        return $users;

    }
?>