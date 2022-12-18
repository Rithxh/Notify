<?php

function emptyInputSignup($fname,$lname,$email,$username,$pwd)
{
    if(empty($fname)|| empty($lname) || empty($email) || empty($username) || empty($pwd))
    {
        $result=true;
    }
    else
    {
        $result=false;
    }
    return $result;
}
function invalidemail($email)
{
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $result=true;
    }
    else
    {
        $result=false;
    }
    return $result;

}

function uidExists($con,$username,$email)
{
    $sql= "SELECT * FROM users WHERE userUID = ? OR userEmail = ?;";
    $stmt =mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location:register.php?error=stmtFail");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username,$email);
    mysqli_stmt_execute($stmt);
    $resultData=mysqli_stmt_get_result($stmt);
    if($row= mysqli_fetch_assoc($resultData))
    {
        return $row;
    }
    else
    {
        $result= false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}


function createUser($con,$fname,$lname,$email,$username,$pwd)
{
    $sql= "INSERT INTO users (userFName,userLName,userEmail,userUID,userPwd) VALUES (?,?,?,?,?);";
    $stmt =mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location:register.php?error=stmtFail");
        exit();
    }
    $hashedPwd=password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $fname,$lname,$email,$username,$hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location:register.php?error=none");
    exit();
}

function emptyInputLogin($username,$pwd)
{
    if(empty($username) || empty($pwd))
    {
        $result=true;
    }
    else
    {
        $result=false;
    }
    return $result;
}

function loginUser($con,$username,$pwd)
{
    $uidExists=uidExists($con,$username,$username);

    if($uidExists === false)
    {
        header("location:login.php?error=wronglogin");
        exit();
    }

    $pwdhashed= $uidExists["userPwd"];
    $checkpwd=password_verify($pwd,$pwdhashed);

    if($checkpwd===false)
    {
        header("location:login.php?error=wronglogin");
        exit();
    }
    else if($checkpwd===true)
    {
        session_start();
        $_SESSION["userID"]=$uidExists["userID"];
        $_SESSION["userUID"]=$uidExists["userUID"];
        header("location:index.php");
        exit();
    }

}

function uploadFile($con,$Name,$Course,$Desc)
{
    session_start();
    $user=$_SESSION["userID"];
    $sql="INSERT INTO files (userID,fileName,fileSub,fileDesc) VALUES (?,?,?,?);";
    $stmt =mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location:upload.php?error=stmtFail");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"isss",$user,$Name,$Course,$Desc);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location:index.php?error=none");
    exit();
}

function uploadReview($con,$uid,$fid,$review,$stars)
{
    $sql="INSERT INTO ratings (userID,fileID,review,stars) VALUES (?,?,?,?);";
    $stmt =mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location:notes.php?error=stmtFail");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"iisi",$uid,$fid,$review,$stars);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location:notes.php?error=none");
    exit();
}
?>
