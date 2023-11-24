<?php
session_start();
?>
<?php
    if(isset($_SESSION['username']))
    {
        
    
?>
<?php
include "connectdb.php";

$fetchQuery="SELECT * from medicine";
$result=$conn->query($fetchQuery);
$row=null;
?>
<!DOCTYPE html>
<html>
<head>
<title>medicine</title>
    <link rel="stylesheet" href="css/bootstrap.css">
<style>
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
       background-color: #007bff;
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
        <a class="nav-link" href="customer.php">Customer</a>
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
         <h1 class="text-center">Medicine Info</h1>
         
 
<?php
    
    if($result->num_rows>0)
    {
?>
 <table id="t01" class="form-group table-bordered table-stripped">
   <tr>
    <th>Id</th>
    <th>Name</th> 
    <th>Group</th>
    <th>Price</th>
    <th>Cost</th>
    <th>Quantity</th>
    <th>Expired Date</th>
    <th>Supplier Name</th>
    <th>Shelf No.</th>
         <th>Action</th>

  </tr>
 <?php
        $i=0;
    while($row=$result->fetch_assoc())
    {
        
 ?>
    <tr>
        
    <td> <?php echo $i=$i+1; ?> </td>
    <td><?php echo $row['medicine_name'];?></td>
    <td><?php echo $row['medicine_group'];?></td>
    <td><?php echo $row['medicine_price'];?></td>
        <td><?php echo $row['medicine_cost'];?></td>
        <td><?php echo $row['quantity'];?></td>
        <td><?php echo $row['expired_date'];?></td>
        <td><?php echo $row['supplier_name'];?></td>
        <td><?php echo $row['shelf_no'];?></td>
    <td> <a class="btn btn-success" href="medicine_edit.php?medicine_name=<?php echo $row['medicine_name'];?>">Edit</a> 
        <br>
        <a class="btn btn-danger" href="medicine_delete.php?medicine_name=<?php echo $row['medicine_name'];?>">Delete</a>
    </td>
     </tr>
    
 <?php   
    }
        
 ?>
 </table>  
<?php
	}
?>

      
       <a class="btn btn-block btn-primary" href="medicine_insert.php">Add</a>
    </div>

</body>
</html>
<?php
}
else {
    header("Location:login.php");
}
?>

