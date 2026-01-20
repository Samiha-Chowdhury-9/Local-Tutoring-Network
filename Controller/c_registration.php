<?php

$nameErr = "";
$genderErr = "";
$phoneErr = "";
$emailErr = "";
$passErr = "";
$confirmPassErr = "";
$roleErr = "";
$hasErr=false;

$name=$_POST['name'];
$gender=$_POST['gender'];
$phoneNum=$_POST['phoneNum'];
$email=$_POST['email'];
$password=$_POST['password'];
$confirmPassword=$_POST['confirmPassword'];
$role=$_POST['role'];

$tutorEducationalBackground=$_POST['tutorEducationalBackground'];
$tutorCurrentInstitution=$_POST['tutorCurrentInstitution'];
$experienceYears=$_POST['experienceYears'];
$shortBiography=$_POST['shortBiography'];

$studentClassLevel=$_POST['studentClassLevel'];
$studentCurrentInstitution=$_POST['studentCurrentInstitution'];
$location=$_POST['location'];

if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(empty($_POST['name']))
        {   
            $nameErr="Username is required";
            $hasErr=true;
        }
        else
        {
            if(!preg_match("/^[a-zA-Z-' ]*$/",$_POST['name']))
            {
                $name_Err="Only letters and white spaces allowed";
                $hasErr=true;
            }
        }

        if(empty($gender)){
            $genderErr="Gender is required";
            $hasErr=true;
        }

        if(empty($phoneNum)){
            $phoneErr="Phone number is required";
            $hasErr=true;
        }

        else{
            
        if(!preg_match("/^[0-9+\-\s]{7,20}$/",$phoneNum)){
            $phoneErr="Invalid phone number";
            $hasErr=true;
        }}

        if(empty($_POST['email']))
        {
            $emailErr="Email is required";
            $hasErr=true;
        }

        else{
            if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
            {
                $email_Err="Invalid email format";
                $hasErr=true;
            }
        }

        if(empty($password)){
            $passErr="Password is required";
            $hasErr=true;
        }
        
        else{
            if(strlen($password)<8){
            $passErr="Password must be at least 8 characters";
            $hasErr=true;
        }}

        
        if(empty($confirmPassword)){
            $confirmPassErr="Confirm password is required";
            $hasErr=true;
        }
        
        else{
            if($password!==$confirmPassword){
            $confirmPassErr="Passwords do not match";
            $hasErr=true;
        }}

       
        if(empty($role)){
            $roleErr="Role is required";
            $hasErr=true;
        }
        
        else{
            if($role!=="tutor" && $role!=="student-guardian"){
            $roleErr="Invalid role";
            $hasErr=true;
        }}

 
        if($role==="tutor"){
            if(empty($tutorEducationalBackground)){
                $roleErr="Educational background is required";
                $hasErr=true;
            }
            if($experienceYears!=="" && (!is_numeric($experienceYears) || $experienceYears<0 || $experienceYears>80)){
                $roleErr="Invalid experience years";
                $hasErr=true;
            }
        }

        if($role==="student-guardian"){
            if(empty($studentClassLevel)){
                $roleErr="Class/level is required";
                $hasErr=true;
            }
            if(empty($location)){
                $roleErr="Location is required";
                $hasErr=true;
            }
        }

        if(!$hasErr)
        {

        };

    }


?>
