<?php
$host="localhost";
$user="root";
$pass="";
$db="pharmacy_management_system";

$conn=new mysqli($host,$user,$pass,$db);
if($conn->connect_error)
{
    die("ERROR: ".$conn->connect_error);
    
}
//echo "Connection establish successfully";
?>