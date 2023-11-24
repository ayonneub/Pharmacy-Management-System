<?php
session_start();
?>
<?php
    if(isset($_SESSION['username']))
    {
        
    
?>
<?php


    if(isset($_GET['id']))
{
         include "connectdb.php";
     $id=$_GET['id'];
    
   
     $fetchQuery="SELECT * from pharmacy_order where $id=id";
     $result=$conn->query($fetchQuery);
       $row=$result->fetch_assoc();
    
        $sum=$row['quantity'];
        $medicine_name=$row['medicine_name'];
    
   // $medicine_name=$row['medicine_name'];
        echo $medicine_name;
         
    
    $updateQuery="UPDATE medicine SET quantity=quantity+$sum WHERE medicine_name='$medicine_name'";
  
    $conn->query($updateQuery);
    
    $updateQuery2="UPDATE pharmacy_order SET flag=1 where $id=id";
    $conn->query($updateQuery2);
    
    
   
        header("Location: pharmacyorder.php");
  
}  
    

?>
<?php
}
else {
    header("Location:login.php");
}
?>