<?php
session_start();
?>
<?php
    if(isset($_SESSION['username']))
    {
        
    
?>
<?php


    
    include "connectdb.php";
     $fetchQuery="SELECT * from pharmacy_order where flag=0";
     $result=$conn->query($fetchQuery);
     $row=null;
    while($row=$result->fetch_assoc())
    {
    $medicine_name=$row['medicine_name'];
    $id=$row['id'];
    $updateQuery="UPDATE medicine,pharmacy_order SET medicine.quantity=(medicine.quantity+pharmacy_order.quantity) WHERE $id=pharmacy_order.id AND medicine.medicine_name=pharmacy_order.medicine_name";
  
    $conn->query($updateQuery);
    
    $updateQuery2="UPDATE pharmacy_order,medicine SET pharmacy_order.flag=1 where $id=pharmacy_order.id";
    $conn->query($updateQuery2);
    }
   
        header("Location: pharmacyorder.php");
  
    
    

?>
<?php
}
else {
    header("Location:login.php");
}
?>