<?php
session_start();
require_once("../Model/m_user.php");
if($_SERVER["REQUEST_METHOD"]=="GET")
{
    $hasErr=false;
    $idErr;
    $passErr;
    $name=$_GET["name"];
    $pass=$_GET["password"];

    if(empty($name) && empty($pass))
    {
        $hasErr=true;
        $idErr="Id cannot be empty";
        $passErr="Password cannot be empty";
        header("Location: ../views/v_login.php?idErr=".$idErr."&passErr=".$passErr);

    }

    else
    {
        $user=authUser($name,$pass);
        if($user)
        {
            if($user['role']==='admin')
            {
                if($user['status']==='active')
                {
                    $_SESSION['name']=$user['Name'];
                    $_SESSION['role']=$user['Role'];
                    header("Location: ../views/vw_admin/v_admin_home.php");
                }

                else
                {
                    header("Location: ../views/v_login.php?genErr=User not found");
                }
                
                
            }

            if($user['role']==='tutor')
            {
                if($user['status']==='active')
                {
                    $_SESSION['name']=$user['Name'];
                    $_SESSION['role']=$user['Role'];
                    header("Location: ../views/vw_tutor/v_tutor_home.php");
                }

                else
                {
                    header("Location: ../views/v_login.php?genErr=User not found");
                }
            }

            if($user['role']==='Student-Guardian')
            {
                if($user['status']==='Active')
                {
                    $_SESSION['name']=$user['Name'];
                    $_SESSION['role']=$user['Role'];
                    header("Location: ../views/vw_student-guardian/v_student-guardian_home.php");
                }

                else
                {
                    header("Location: ../views/v_login.php?genErr=User not found");
                }
            }

        else
        {
            header("Location: ../views/login.php?genErr=Id or password didn't match");

        }
    }
}
}

?>