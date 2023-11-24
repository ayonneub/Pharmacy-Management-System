<?php
session_start();
?>
<?php
    if(isset($_SESSION['username']))
    {
        
    
?>

<?php
include "connectdb.php";

$fetchQuery="SELECT * from customer";
$result=$conn->query($fetchQuery);
$row=null;
?>
<!DOCTYPE html>
<html>
<head>
<title>customer</title>
    <link rel="stylesheet" href="css/bootstrap.css">
<style>
    .pt-50{
        padding-top: 50px;
    }
table {
    width:100%;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 15px;
    text-align: left;
}
table#t01 tr:nth-child(even) {
    background-color: #eee;
}
table#t01 tr:nth-child(odd) {
   background-color: #fff;
}
table#t01 th {
    background-color: black;
    color: white;
}
</style>
</head>
<body>
    
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <div class="container">
       
  <!-- Brand -->
  <a class="navbar-brand" href="#">Pharmacy</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="medicine.php">Medicine</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="supplier.php">Supplier</a>
      </li> 
      
      <li class="nav-item">
        <a class="nav-link" href="customerorder.php">Customer Order</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="pharmacyorder.php">Pharmacy Order</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="manager.php">Manager</a>
        </li>
        
      <a class="btn btn-danger" href="logout.php">Log Out</a>
      
      
    </ul>
  </div> 
             </div>
</nav>
     <div class="container pt-50">
         
 <h1 class="text-center">Customer Info</h1>
<?php
    
    if($result->num_rows>0)
    {
?>
 <table id="t01" class="form-group table-bordered table-stripped">
     
  <tr>
    <th>Id</th>
    <th>Name</th> 
    <th>Mobile Number</th>
<!--    <th>Address</th>-->
    <th>Action</th>
  </tr>
 <?php
        $i=0;
    while($row=$result->fetch_assoc())
    {
        
 ?>
    <tr>
        
    <td> <?php echo $i=$i+1; ?> </td>
    <td><?php echo $row['customer_name'];?></td>
    <td><?php echo $row['mobile_number'];?></td>
<!--    <td><//?php echo $row['customer_address'];?></td>-->
    <td><a class="btn btn-success" href="customer_edit.php?mobile_number=<?php echo $row['mobile_number'];?>">Edit</a> 
        <a class="btn btn-danger" href="customer_delete.php?mobile_number=<?php echo $row['mobile_number'];?>">Delete</a></td>
  </tr>
    
 <?php   
    }
        
 ?>
 </table>  
<?php
	}
?>

      
         <a class="btn btn-block btn-primary" href="customer_insert.php">Add</a>
    </div>

</body>
</html>
<?php
}
else {
    header("Location:login.php");
}
?>

