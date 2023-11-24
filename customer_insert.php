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
       $customer_name=$_POST['customer_name'];
       $mobile_number=$_POST['mobile_number'];
       $customer_address=$_POST['customer_address'];
       
       $insertQuery="INSERT INTO customer(customer_name,mobile_number,customer_address) VALUES('$customer_name','$mobile_number','$customer_address')";
       
       if($conn->query($insertQuery)==true)
       {
           
           //$result="Data  Inserted Successfully";
           Header("Location: customer.php");
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
        <h2 class="text-center">Add Customer Info</h2>
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" style="width:60%; margin:0 auto;">
        <label for="">Enter Customer Name: </label><input type="text" class="form-control form-group" name="customer_name" required/>
        <label for="">Enter Customer Mobile Number: </label><input type="text" class="form-control form-group" name="mobile_number" required/>
        <label for="">Enter Customer Address: </label><input type="text" class="form-control form-group" name="customer_address" required/>
        
        <input type="submit" class="btn btn-success" name="insertData" value="Insert Data"/>
        
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