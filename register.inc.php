<?php

if(isset($_POST["submitRegister"]))
{
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $email=$_POST["email"];
    $username=$_POST["uid"];
    $pwd=$_POST["pwd"];


    require_once 'database.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($fname,$lname,$email,$username,$pwd)!== false)
    {
        header("location:register.php?error=emptyinput");
        exit();
    }
    if(invalidemail($email)!== false)
    {
        header("location:register.php?error=invalidemail");
        exit();
    }
    if(uidExists($con,$username,$email)!== false)
    {
        header("location:register.php?error=usernametaken");
        exit();
    }

    createUser($con,$fname,$lname,$email,$username,$pwd);

}
else
{
    header("location:register.php");
    exit();
}

?>
