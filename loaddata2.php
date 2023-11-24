
<?php
session_start();
?>
<?php
    if(isset($_SESSION['username']))
    {
        
    
?>
<?php
include './connectdb.php';
if(isset($_POST['done'])){
    $medicine_name=$_POST['p_medicin'];
    $quantity = $_POST['p_scnt'];
    
    $insertQuery="INSERT INTO `medicine_list2`(`M_name`, `quantity`) VALUES ('$medicine_name', $quantity)";
       
       if($conn->query($insertQuery)==true)
       {
           
       }else
       {
           die($conn->error);
       }
}
if(isset($_POST['disply'])){
    //select all;
}

//$findSeat="SELECT * FROM `seat` WHERE seat_no LIKE'$seatNumber' AND schedule_no=$scheduleNo";
//$findseat_result=$conn->query($findSeat);
//
//if ($findseat_result->num_rows > 0) {
//    $deleteSeat="DELETE FROM `seat` WHERE seat_no LIKE'$seatNumber' AND schedule_no=$scheduleNo;";
//    $deleteSeat_result=$conn->query($deleteSeat);
//
//} else {
//    $productInsertQuery = "INSERT INTO `seat`(`seat_no`, `schedule_no`) VALUES ('$seatNumber', $scheduleNo)";
//    $insertProduct = $conn->query($productInsertQuery);
//}
//        $allSeat = "SELECT seat_no FROM `seat` WHERE schedule_no=$scheduleNo;";
//        $seat_Result = $conn->query($allSeat)
//        ;
//        
//$priceSearch="SELECT price FROM `bus_schedule` WHERE id=$scheduleNo";
//$price_Result = $conn->query($priceSearch);
//$price_seat=$price_Result->fetch_assoc();
//$p=$price_seat['price'];

$result = $conn->query("SELECT * FROM `medicine_list2` WHERE 1");

                                       
                                            
                                                echo'<table class="table table-bordered">';
                                                    echo'<thead>';
                                                        echo'<tr>';
                                                            echo'<th>Medicine</th>';
                                                            echo'<th>Quantity</th>';
                                                            echo'<th>Cost</th>';
                                                            echo'<th>Action</th>';
                                                        echo'</tr>';
                                                    echo'</thead>';
                                                    echo'<tbody>';
                                                 $seat_count=0; $total_cost=0;   while ($row = $result->fetch_assoc()) {
                                                         echo'<tr>';
                                                     
                                                            echo'<td>';
                                                        echo $row['M_name'];
                                                                echo'</td>';
                                                            echo'<td> ';
                                                            $n=$row['quantity'];    
                                                            echo $row['quantity'];
                                                            echo '</td>';
                                                             echo'<td> ';
                                                             //SELECT `medicine_price` FROM `medicine` WHERE `medicine_name`= 
                                                             $name=$row['M_name'];
                                                             $result_price = $conn->query("SELECT `medicine_cost` FROM `medicine` WHERE `medicine_name`='$name'");
                                                             while ($row = $result_price->fetch_assoc()) {
                                                             echo $p=$row['medicine_cost']* $n; $total_cost=$total_cost+$p;
                                                             }
                                                            echo '</td>';
                                                             echo'<td> ';
                                                                echo '<button >Remove</button>'; 
                                                            echo '</td>';
                                                     echo'</tr>'; $seat_count=$seat_count+1;}
                                                     echo'<tr>';
                                                     
                                                            echo'<td colspan=2>';
                                                        echo '<strong>Selected Seats: '.$seat_count, '</strong>';
                                                                echo'</td>';
                                                            echo'<td colspan=2>';
                                                                echo '<strong>Total: BDT '.$total_cost, '</strong>';
                                                            echo '</td>';
                                                     echo'</tr>';
                                                    echo'</tbody>';
                                                echo'</table>';
                                            
?>
<?php
}
else {
    header("Location:login.php");
}
?>
