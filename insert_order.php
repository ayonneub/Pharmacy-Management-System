<?php

if(isset($_POST['insert_order'])) 
   {
       
    //$number=$_POST['setnumber'];
    //echo $number;
    
    
    $medicine_name=$_POST['p_medicin'];
    $medicine_Q=$_POST['p_scnt'];
    $customer=$_POST['customer'];
    $phone=$_POST['phone'];
    
    echo $medicine_Q.' '.$medicine_name.' '.$customer.' '.$phone;   
    //$insertQuery="INSERT INTO pharmacy_order(medicine_name,supplier_name,quantity,flag,username) VALUES('$medicine_name','$get_name',$quantity,$flag,'$username')";
       
    
       
       
       
   }
?>