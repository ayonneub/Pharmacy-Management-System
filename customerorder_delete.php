<?php
session_start();
?>
<?php
    if(isset($_SESSION['username']))
    {
        
    
?>
<?php


    
    include "connectdb.php";
     $fetchQuery="SELECT * from customer_order where flag=0";
     $result=$conn->query($fetchQuery);
     $row=null;
    while($row=$result->fetch_assoc())
    {
    $medicine_name=$row['medicine_name'];
    $id=$row['id'];
    $updateQuery="UPDATE medicine,customer_order SET medicine.quantity=(medicine.quantity-customer_order.quantity) WHERE $id=customer_order.id AND medicine.medicine_name=customer_order.medicine_name";
  
    $conn->query($updateQuery);
    
    $updateQuery2="UPDATE customer_order,medicine SET customer_order.flag=1 where $id=customer_order.id";
    $conn->query($updateQuery2);
    }
   
        header("Location: customerorder.php");
  
    
    

?>
<?php
}
else {
    header("Location:login.php");
}
?>