<?php
session_start();

?>
<?php
    if(isset($_SESSION['username']))
    {
        
    
?>

<?php
include "connectdb.php";

$fetchQuery="SELECT * from pharmacy_order where flag=0";
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
        <a class="nav-link" href="customer.php">Customer</a>
        </li>
      <li class="nav-item">
        <a class="nav-link" href="supplier.php">Supplier</a>
      </li> 
      
      <li class="nav-item">
        <a class="nav-link" href="customerorder.php">Customer Order</a>
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
         
 <h1 class="text-center">Supplier Order</h1>
<?php
    
    if($result->num_rows>0)
    {
?>
 <table id="t01" class="form-group table-bordered table-stripped">
     
  <tr>
<!--     <th>Manager Name</th>
    <th>Supplier Name</th>-->
    <th>Medicine Name</th> 
    <th>Quantity</th>
    <th>Price In Total</th>
    <th>Action</th>
  </tr>
 <?php
        $uname=$_SESSION['username'];
       // $getValue2="SELECT * from pharmacy_order,supplier where pharmacy_order.supplier_name=supplier.supplier_name";
       // $result3=$conn->query($getValue2);
        //$getValue3="SELECT * from manager,pharmacy_order where pharmacy_order.username=manager.username";
       
       // $result4=$conn->query($getValue3);
        
 
      //  $row3=$result3->fetch_assoc();
       // $row4=$result4->fetch_assoc();
        
//        $re="SELECT count(flag) AS total from pharmacy_order where flag=0";
//        $tre=$conn->query($re);
//       $rs=$tre->fetch_assoc();
//       
  ?>
  
 
 <?php
 $sum=0;
    while($row=$result->fetch_assoc())
    {
        $id=$row['id'];

       $getValue="SELECT * from pharmacy_order,medicine where pharmacy_order.medicine_name=medicine.medicine_name and $id=pharmacy_order.id";
       $result2=$conn->query($getValue);


        
        $row2=$result2->fetch_assoc();
//        $row3=$result3->fetch_assoc();
//        $row4=$result4->fetch_assoc();
//    
//        echo $row4['manager_name']." ";
//        echo $row3['supplier_name'];
       
 ?>
  <tr>
<!--    <td <//?php echo $row4['manager_name'];?></td>-->
<!--    <td<//?php echo $row3['supplier_name'];?></td>-->
    <td><?php echo $row['medicine_name'];?></td>
    <td><?php echo $row['quantity'];?></td>
    <td><?php echo $row['quantity']*$row2['medicine_cost'];?></td>
    <?php //$sum+=$row['quantity']*$row2['medicine_cost'];?>
    <td><a class="btn btn-success" href="customerorder_edit.php?id=<?php echo $row['id'];?>">Edit</a> 
    <a class="btn btn-danger" href="pharmacyorder_delete.php?id=<?php echo $row['id'];?>">Order Imposed</a></td>
       
  </tr>
    
 <?php   
    }
        
 ?>
 </table>  
<?php
	}
    
?>
 

      
         
 
     <?php
     //$re="SELECT count(flag) AS total from pharmacy_order where flag=0";
     //   $tre=$conn->query($re);
     //  $rs=$tre->fetch_assoc();
    // if($rs['total'])
     {?>
   <!-- <h2 class="text">Total:<?php// echo $sum;?> Taka Only</h2>-->
 
    <?php
     }
     //else
     {
      //   ?>
    <a class="btn btn-block btn-primary" href="pharmacyorder_insert.php">Add</a>
     <?php
     
     }
     ?>
     
</div>

</body>
</html>
<?php
}
else {
    header("Location:login.php");
}
?>


