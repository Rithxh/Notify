<?php

  if(isset($_POST["submitUpload"]))
  {
    $Name=$_POST["file-name"];
    $Course=$_POST["course"];
    $Desc=$_POST["desc"];

    $fileTmpName=$_FILES['file']['tmp_name'];
    $fileName=$_FILES['file']['name'];
    $fileExt=explode('.',$fileName);
    $fileActExt=strtolower(end($fileExt));
    $fileNameNew=$Name.'.'.$fileActExt;
    $fileDest='uploads/'.$fileNameNew;
    move_uploaded_file($fileTmpName,$fileDest);

    require_once 'database.php';
    require_once 'functions.inc.php';

    uploadFile($con,$Name,$Course,$Desc);
  }
  else
  {
    header("location: upload.php");
  }



?>
