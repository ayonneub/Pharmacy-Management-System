<?php
session_start();
?>
<?php
    if(isset($_SESSION['username']))
    {
        
    
?>
<?php
    include './connectdb.php';
if(isset($_POST['recit2'])){
    $user_name=$_POST['name'];
    $phone=$_POST['phone_number'];
    //echo $user_name.$phone;
    $fetch_user="SELECT * FROM `supplier` WHERE `mobile_number`='$phone'";
    $result_user = $conn->query($fetch_user);
    if($result_user->num_rows==0)
    {
        $inser_user="INSERT INTO `supplier`(`supplier_name`, `mobile_number`) VALUES ('$user_name', '$phone')";
        if($conn->query($inser_user)==true)
       {
            echo 'User insert';
       }
       else
       {
           die($conn->error);
       }
    }


    
    $fetchQuery = "SELECT * FROM `medicine_list2` WHERE 1";
    $result = $conn->query($fetchQuery);
    while ($row = $result->fetch_assoc()){
        $medicine_name=$row['M_name'];
        $medicine_Quntity=$row['quantity'];
//        $selectQuntity="SELECT `quantity` FROM `medicine` WHERE `medicine_name`='$medicine_name'";
//       $result_Quantity = $conn->query($selectQuntity);
//       $quantity_row = $result_Quantity->fetch_assoc();
//        $q=$quantity_row['quantity']+$medicine_Quntity;
//        $updat_medicine="UPDATE `medicine` SET `quantity`=$q WHERE `medicine_name`='$medicine_name'";
//        if($conn->query($updat_medicine)==true){
//           echo 'insert Order';
//        }else{
//           die($conn->error);
//        }
        $uname= $_SESSION['username'];  
        $insertQuery="INSERT INTO `pharmacy_order`(`medicine_name`, `supplier_name`, `quantity`,`flag`,`username`) VALUES ('$medicine_name', '$user_name', $medicine_Quntity,0,'$uname')";
       
       if($conn->query($insertQuery)==true)
       {
            header("Location:pharmacyorder.php");
       }
       else
       {
           die($conn->error);
       }
    }
   $deleteMedicine_list="DELETE FROM `medicine_list2` WHERE 1";
    if($conn->query($deleteMedicine_list)==true){
        
   }else{
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
