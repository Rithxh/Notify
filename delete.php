<?php

    require_once 'database.php';
    require_once 'functions.inc.php';

    $sql= "SELECT * FROM files WHERE fileName=?;";
    $stmt =mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location:notes.php?error=stmtFail");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $fname);
    mysqli_stmt_execute($stmt);
    $resultData=mysqli_stmt_get_result($stmt);
    $result=mysqli_fetch_assoc($resultData);
    $fileID=$result['fileID'];




    $fname=$_GET['fileName'];
    $sql= "DELETE FROM files WHERE fileName = ?;";
    $stmt =mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location:profile.php?error=stmtFail");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s",$fname);
    if(mysqli_stmt_execute($stmt))
    {
      header("location:profile.php?error=none");
    }
    else {
      header("location:profile.php?error=stmtFail");
      exit();
    }
?>
