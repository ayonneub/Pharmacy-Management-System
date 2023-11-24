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
       $medicine_name=$_POST['medicine_name'];
       $medicine_group=$_POST['medicine_group'];
       $medicine_cost=$_POST['medicine_cost'];
        $medicine_price=$_POST['medicine_price'];
        $quantity=$_POST['quantity'];
        $expired_date=$_POST['expired_date'];
        $supplier_name=$_POST['supplier_name'];
        $shelf_no=$_POST['shelf_no'];
       
       $insertQuery="INSERT INTO medicine(medicine_name,medicine_group,medicine_cost,medicine_price,quantity,expired_date,supplier_name,shelf_no) VALUES('$medicine_name','$medicine_group',$medicine_cost,$medicine_price,$quantity,'$expired_date','$supplier_name','$shelf_no')";
       
       if($conn->query($insertQuery)==true)
       {
           
           //$result="Data  Inserted Successfully";
           Header("Location: medicine.php");
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
    <title>Add Medicine</title>
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="jumbotron">
        <h2 class="text-center">Add Medicine Info</h2>
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" style="width:60%; margin:0 auto;">
        <label for="">Enter Medicine Name: </label><input type="text" class="form-control form-group" name="medicine_name" required/>
        <label for="">Enter Medicine Group: </label><input type="text" class="form-control form-group" name="medicine_group" required/>
        <label for="">Enter Medicine Cost: </label> <input type="text" class="form-control form-group" name="medicine_cost" required/>
        <label for="">Enter Medicine Price: </label><input type="text" class="form-control form-group" name="medicine_price" required/>
        <label for="">Enter Quantity: </label><input type="text" class="form-control form-group" name="quantity" required/>
        <label for="">Enter Expired Date: </label><input type="text" class="form-control form-group" name="expired_date" required/>
        <label for="">Enter Supplier Name: </label><input type="text" class="form-control form-group" name="supplier_name" required/>
        <label for="">Enter Shelf No: </label><input type="text" class="form-control form-group" name="shelf_no" required/>
        
        
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