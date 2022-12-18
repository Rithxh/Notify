<?php
$servername="localhost";
$dbusername="root";
$dbpassword="";
$database="notes";
$con=mysqli_connect($servername,$dbusername,$dbpassword,$database);
if(!$con)
{
    die("Error detected".mysqli_connect_error());
}
?>
