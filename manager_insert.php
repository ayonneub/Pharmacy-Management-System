<?php
session_start();
?>
<?php
    if(isset($_SESSION['username']))
    {
        
    
?>
<?php
if(isset($_POST['updateData']))
{
    include "connectdb.php";
  
   $manager_name=$_POST['manager_name'];
   $username=$_POST['username'];
   $mobile_number=$_POST['mobile_number'];
   $password=$_POST['password'];
   $manager_address=$_POST['manager_address'];
    
   $insertQuery="INSERT INTO manager(manager_name,username,mobile_number,password,manager_address) VALUES('$manager_name','$username','$mobile_number','$password','$manager_address')"; 
    
   if($conn->query($insertQuery)==true)
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
        <h2 class="text-center">Add Manager Info</h2>
         <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" style="width:60%; margin:0 auto;">
        <label for="">Enter Manager Name: </label>
        <input type="text" class="form-control form-group" name="manager_name" value="" />
        <label for="">Enter Manager User Name: </label>
        <input type="text" class="form-control form-group" name="username" />
        <label for="">Enter manager Mobile Number: </label>
        <input type="text" class="form-control form-group" name="mobile_number" />
        <label for="">Enter manager password: </label>
        <input type="password" class="form-control form-group" name="password" />
        <label for="">Enter manager Address: </label>
        <input type="text" class="form-control form-group" name="manager_address" />
        
        <input type="submit" class="btn btn-success" name="updateData" value="Insert Data"/>
        
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