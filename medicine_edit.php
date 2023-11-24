<?php
session_start();
?>
<?php
    if(isset($_SESSION['username']))
    {
        
    
?>
<?php
include "connectdb.php";
 $update_name=$_GET['medicine_name'];
 $fetchQuery="SELECT * from medicine where medicine_name='$update_name'";
$result=$conn->query($fetchQuery);
$row=$result->fetch_assoc();

if(isset($_POST['updateData']))
{
    
   
    $medicine_name=$_POST['medicine_name'];  
   $medicine_group=$_POST['medicine_group'];
   $medicine_cost=$_POST['medicine_cost'];
   $medicine_price=$_POST['medicine_price'];
    $quantity=$_POST['quantity'];
    $expired_date=$_POST['expired_date'];
    $supplier_name=$_POST['supplier_name'];
    $shelf_no=$_POST['shelf_no'];
    
   $updateQuery="UPDATE medicine SET medicine_name='$medicine_name',medicine_group='$medicine_group',medicine_cost='$medicine_cost',medicine_price='$medicine_price',quantity='$quantity',expired_date='$expired_date',supplier_name='$supplier_name',shelf_no='$shelf_no' WHERE medicine_name='$update_name'"; 
    
   if($conn->query($updateQuery)==true)
   {
       header("Location: medicine.php");
        
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
    <title>Edit Medicine</title>
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="jumbotron">
        <h2 class="text-center">Edit Medicine Info</h2>
   <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" style="width:60%; margin:0 auto;">
       <label for="">Enter Medicine Name: </label><input type="text" class="form-control form-group" name="medicine_name" value="<?php echo $row['medicine_name'];?>" required/>
        <label for="">Enter Medicine Group: </label><input type="text" class="form-control form-group" name="medicine_group" value="<?php echo $row['medicine_group'];?>" required/>
        <label for="">Enter Medicine Cost: </label> <input type="text" class="form-control form-group" name="medicine_cost" value="<?php echo $row['medicine_cost'];?>"  required/>
        <label for="">Enter Medicine Price: </label><input type="text" class="form-control form-group" name="medicine_price" value="<?php echo $row['medicine_price'];?>" required/>
        <label for="">Enter Quantity: </label><input type="text" class="form-control form-group" name="quantity" value="<?php echo $row['quantity'];?>"  required/>
        <label for="">Enter Expired Date: </label><input type="text" class="form-control form-group" name="expired_date" value="<?php echo $row['expired_date'];?>"  required/>
        <label for="">Enter Supplier Name: </label><input type="text" class="form-control form-group" name="supplier_name" value="<?php echo $row['supplier_name'];?>"  required/>
        <label for="">Enter Shelf No: </label><input type="text" class="form-control form-group" name="shelf_no" value="<?php echo $row['shelf_no'];?>"  required/>
        
        
        <input type="submit" class="btn btn-success" name="updateData" value="Update Data"/>
        
    </form>
        </div>
    
    </div>
</body>
</html>
<?php
}
else {
    header("Location:login.php");
}
?>