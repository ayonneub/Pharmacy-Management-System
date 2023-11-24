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
 $fetchQuery="SELECT * from manager where mobile_number='$update_number'";
$result=$conn->query($fetchQuery);
$row=$result->fetch_assoc();

if(isset($_POST['updateData']))
{
    
   $manager_name=$_POST['manager_name'];
   $username=$_POST['username'];
   $mobile_number=$_POST['mobile_number'];
   $password=$_POST['password'];
   $manager_address=$_POST['manager_address'];
    
   $updateQuery="UPDATE manager SET mobile_number='$mobile_number',manager_name='$manager_name',manager_address='$manager_address',password='$password',username='$username' WHERE mobile_number='$update_number'"; 
    
   if($conn->query($updateQuery)==true)
   {
       header("Location: manager.php");
        
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
    <title>Edit Manager</title>
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="jumbotron">
        <h2 class="text-center">Edit Manager Info</h2>
         <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" style="width:60%; margin:0 auto;">
        <label for="">Enter Manager Name: </label>
        <input type="text" class="form-control form-group" name="manager_name" value="<?php echo $row['manager_name'];?>" />
        <label for="">Enter Manager User Name: </label>
        <input type="text" class="form-control form-group" name="username" value="<?php echo $row['username'];?>" />
        <label for="">Enter manager Mobile Number: </label>
        <input type="text" class="form-control form-group" name="mobile_number" value="<?php echo $row['mobile_number'];?>" />
        <label for="">Enter manager password: </label>
        <input type="password" class="form-control form-group" name="password" value="<?php echo $row['password'];?>" />
        <label for="">Enter manager Address: </label>
        <input type="text" class="form-control form-group" name="manager_address" value="<?php echo $row['manager_address'];?>" />
        
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