<?php
session_start();
?>
<?php
    if(isset($_SESSION['username']))
    {
    
?>
<?php
include "connectdb.php";
$result=null;
   if(isset($_POST['insertData'])) 
   {
       $get_mobile=$_GET['mobile_number'];
       $medicine_name=$_POST['medicine_name'];
       $quantity=$_POST['quantity'];
       $flag=0;
       $username=$_SESSION['username'];
       
       $insertQuery="INSERT INTO customer_order(medicine_name,mobile_number,quantity,flag,username) VALUES('$medicine_name','$get_mobile',$quantity,$flag,'$username')";
       
       if($conn->query($insertQuery)==true)
       {
          $p=$_GET['p']+1;
           //$result="Data  Inserted Successfully";
           Header("Location: customerorder_insert1.php?mobile_number=$get_mobile");
       }
       else
       {
           die($conn->error);
       }
       
       
       
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>pharmacy</title>
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="jumbotron">
        <h2 class="text-center">Add Customer Order</h2>
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" style="width:60%; margin:0 auto;">
        <label for="">Enter Medicine Name: </label><input type="text" class="form-control form-group" name="medicine_name" required/>
        <label for="">Enter Quantity: </label><input type="text" class="form-control form-group" name="quantity" required/>
        
        <input type="submit" class="btn btn-success" name="insertData" value="Insert Data"/>
        <a class="btn btn-primary" href="customerorder.php">Complete</a>
        
        
    </form>
       
        </div>
    
    </div>
    <p class="result"><?php echo $result;?></p>
</body>
</html>
<?php
}
else {
    header("Location:login.php");
}
?>