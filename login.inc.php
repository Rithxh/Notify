<?php

if(isset($_POST["submitLogin"]))
{
    $username=$_POST["uid"];
    $pwd=$_POST["pwd"];

    require_once 'database.php';
    require_once 'functions.inc.php';

    if(emptyInputLogin($username,$pwd)!== false)
    {
        header("location:login.php?error=emptyinput");
        exit();
    }

    loginUser($con,$username,$pwd);
}
else
{
    header("location:login.php");
    exit();
}

?>
