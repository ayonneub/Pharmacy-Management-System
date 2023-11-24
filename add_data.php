<?php
session_start();
?>
<?php
    if(isset($_SESSION['username']))
    {
        
    
?>
<?php
 		include './connectdb.php';
		
		$name = $_POST['p_medicin'];
		$age = $_POST['p_scnt'];
		
		 $insertQuery="INSERT INTO `medicine_list`(`M_name`, `quantity`) VALUES ('$name', $age)";
       
       if($conn->query($insertQuery)==true)
       {
           //echo "Successfully Inserted";
       }else
       {
           die($conn->error);
       }

?>
<?php
}
else {
    header("Location:login.php");
}
?>