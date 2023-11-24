<?php
session_start();
?>
<?php
    if(isset($_SESSION['username']))
    {
        
    
?>
<?php

if(isset($_GET['mobile_number']))
{
    include "connectdb.php";
    
    $mobile_number=$_GET['mobile_number'];
    
    $deleteQuery="DELETE FROM manager WHERE mobile_number='$mobile_number'";
    
    if($conn->query($deleteQuery)==true)
    {
        header("Location: manager.php");
        
    }
    else
    {
        die($conn->error);
    }
    
    
}
?>
<?php
}
else {
    header("Location:login.php");
}
?>