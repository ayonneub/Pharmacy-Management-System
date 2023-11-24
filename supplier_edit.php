<?php
session_start();
?>
<?php
    if(isset($_SESSION['username']))
    {
        
    
?>
<?php
include "connectdb.php";
 $update_number=$_GET['mobile_number'];
 $fetchQuery="SELECT * from supplier where mobile_number='$update_number'";
$result=$conn->query($fetchQuery);
$row=$result->fetch_assoc();
if(isset($_POST['updateData']))
{
    
   $supplier_name=$_POST['supplier_name'];
   $mobile_number=$_POST['mobile_number'];
   $supplier_address=$_POST['supplier_address'];
    
   $updateQuery="UPDATE supplier SET mobile_number='$mobile_number',supplier_name='$supplier_name',supplier_address='$supplier_address' WHERE mobile_number='$update_number'"; 
    
   if($conn->query($updateQuery)==true)
   {
       header("Location: supplier.php");
        
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
    <title>Edit Customer</title>
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="jumbotron">
        <h2 class="text-center">Edit Supplier Info</h2>
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" style="width:60%; margin:0 auto;">
        <label for="">Enter Supplier Name: </label><input type="text" class="form-control form-group" name="supplier_name" value="<?php echo $row['supplier_name'];?>" />
        <label for="">Enter Supplier Mobile Number: </label><input type="text" class="form-control form-group" name="mobile_number" value="<?php echo $row['mobile_number'];?>" />
<!--        <label for="">Enter supplier Address: </label><input type="text" class="form-control form-group" name="supplier_address" value="<?php echo $row['supplier_address'];?>" />-->
        
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