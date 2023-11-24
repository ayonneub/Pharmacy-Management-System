<?php
session_start();
?>
<?php
    if(isset($_SESSION['username']))
    {
        
    
?>
<?php

if(isset($_GET['medicine_name']))
{
    include "connectdb.php";
    
    $medicine_name=$_GET['medicine_name'];
    
    $deleteQuery="DELETE FROM medicine WHERE medicine_name='$medicine_name'";
    
    if($conn->query($deleteQuery)==true)
    {
        header("Location: medicine.php");
        
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