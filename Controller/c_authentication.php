<?php
session_start();
require_once("../Model/m_user.php");
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $hasErr=false;
    $nameErr;
    $passErr;
    $name=$_POST["name"];
    $pass=$_POST["password"];

        if(empty($name) && empty($pass))
        {
            $hasErr=true;
            $nameErr="Name cannot be empty";
            $passErr="Password cannot be empty";
            header("Location: ../View/v_login.php?nameErr=".$nameErr."&passErr=".$passErr);
            exit;
        }

        else
        {
            $user=authUser($name,$pass);
            if($user)
            {
                if(strtolower($user['Role'])=='admin')
                {
                    if(strtolower($user['Status'])=='active')
                    {
                        $_SESSION['name']=$user['Name'];
                        $_SESSION['role']=$user['Role'];
                        header("Location: ../View/vw_admin/v_admin_home.php");
                        exit;
                    }

                    else
                    {
                        header("Location: ../View/v_login.php?genErr=User not found");
                        exit;
                    }
                    
                    
                }

                elseif(strtolower($user['Role'])=='tutor')
                {
                    if(strtolower($user['Status'])=='active')
                    {
                        $_SESSION['name']=$user['Name'];
                        $_SESSION['role']=$user['Role'];
                        header("Location: ../View/vw_tutor/v_tutor_home.php");
                        exit;
                    }

                    else
                    {
                        header("Location: ../View/v_login.php?genErr=User not found");
                        exit;
                    }
                }

                elseif(strtolower($user['Role'])=='student-guardian')
                {
                    if(strtolower($user['Status'])=='active')
                    {
                        $_SESSION['name']=$user['Name'];
                        $_SESSION['role']=$user['Role'];
                        header("Location: ../View/vw_student-guardian/v_student-guardian_home.php");
                        exit;
                    }

                    else
                    {
                        header("Location: ../View/v_login.php?genErr=User not found");
                        exit;
                    }
                }
            }
            else
            {
                header("Location: ../View/v_login.php?genErr=Id or password didn't match");
                exit;

            }
        
    }
}

?>