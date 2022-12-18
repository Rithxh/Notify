<?php

if(isset($_POST["submitReview"]))
{
    $fileID=$_POST["fileID"];
    $userID=$_POST["uid"];
    $rev=$_POST["review"];
    $stars=$_POST["stars"];


    require_once 'database.php';
    require_once 'functions.inc.php';

    uploadReview($con,$userID,$fileID,$rev,$stars);

}
else
{
    header("location:notes.php");
    exit();
}

?>
