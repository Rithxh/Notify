<?php

if(isset($_POST["submitEdit"]))
{
  $newFname=$_POST["new-fname"];
  $newLname=$_POST["new-lname"];
  $newEmail=$_POST["new-email"];
  $newUsername=$_POST["new-uid"];


  require_once 'database.php';
  require_once 'functions.inc.php';
  session_start();
  $id=$_SESSION['userID'];

  $select= "SELECT * FROM users WHERE userID=?;";
  $stmt=mysqli_stmt_init($con);
  if(!mysqli_stmt_prepare($stmt,$select))
  {
    header("location:profile.php?error=stmtFail");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $resultData=mysqli_stmt_get_result($stmt);
  if($row= mysqli_fetch_assoc($resultData))
  {
    if($row['userID'] === $id)
    {
      $update = "UPDATE users SET userFName=?,userLName=?,userEmail=?,userUID=? WHERE userID=?;";
      $stmt=mysqli_stmt_init($con);
      if(!mysqli_stmt_prepare($stmt,$update))
      {
        header("location:profile.php?error=uptFail");
        exit();
      }
      mysqli_stmt_bind_param($stmt, "ssssi",$newFname,$newLname,$newEmail,$newUsername,$id);
      if(mysqli_stmt_execute($stmt))
      {
        header('location:profile.php?error=none');
        $_SESSION['userUID']=$newUsername;
      }
    }
    else
    {
      header('location:editProfile.php?error=idNotFound');
    }
  }
}

 ?>
