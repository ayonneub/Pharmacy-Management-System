<?php
session_start();
if(isset($_SESSION['username']))
    {
require('fpdf17/fpdf.php');
include './connectdb.php';
if(isset($_POST['recit'])){
    $user_name=$_POST['name'];
    $phone=$_POST['phone_number'];
    //echo $user_name.$phone;
    $fetch_user="SELECT * FROM `customer` WHERE `mobile_number`='$phone'";
    $result_user = $conn->query($fetch_user);
    if($result_user->num_rows==0)
    {
        $inser_user="INSERT INTO `customer`(`customer_name`, `mobile_number`) VALUES ('$user_name', '$phone')";
        if($conn->query($inser_user)==true)
       {
            //echo 'User insert';
       }
       else
       {
           die($conn->error);
       }
    }


    
    $fetchQuery = "SELECT * FROM `medicine_list` WHERE 1";
    $result = $conn->query($fetchQuery);
    while ($row = $result->fetch_assoc()) {
        $medicine_name=$row['M_name'];
        $medicine_Quntity=$row['quantity'];
        $selectQuntity="SELECT `quantity` FROM `medicine` WHERE `medicine_name`='$medicine_name'";
        $result_Quantity = $conn->query($selectQuntity);
        $quantity_row = $result_Quantity->fetch_assoc();
        $q=$quantity_row['quantity']-$medicine_Quntity;
        $updat_medicine="UPDATE `medicine` SET `quantity`=$q WHERE `medicine_name`='$medicine_name'";
        if($conn->query($updat_medicine)==true){
            //echo 'insert Order';
        }else{
            die($conn->error);
        }
         $uname= $_SESSION['username'];    
        $insertQuery="INSERT INTO `customer_order`(`medicine_name`, `mobile_number`, `quantity`,`username`) VALUES ('$medicine_name', '$phone', $medicine_Quntity,'$uname')";
       
       if($conn->query($insertQuery)==true)
       {
           //echo 'Data insarted';
       }
       else
       {
           die($conn->error);
       }
    }
    
    
    
    //Selct Medicine
    $result = $conn->query("SELECT * FROM `medicine_list` WHERE 1");
    
    
    
    
}
//$selecCustomerOrder="SELECT * FROM `customer_order` WHERE `mobile_number`='01778941727' and `date`='2019-01-09 21:32:18'"
//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();


//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',24);

//Cell(width , height , text , border , end line , [align] )
$pdf->Cell(7.25	,20,'',0,0);
$pdf->Cell(87.5,20,'Popular Pharmacy',0,0,"L");
//set font to arial, bold, 14pt
$pdf->SetFont('Arial','',12);
//$pdf->Cell(87.5,20,'Date: 11-01-2019',0,0,"R");
$pdf->Cell(7.25 ,20,"",0,0);


//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,8,'',0,1);//end of line

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','',12);
//Cell(width , height , text , border , end line , [align] )
$pdf->Cell(7.25,20,'',0,0);
$pdf->Cell(87.5,20,'Osamin Medical Road,Sylhet',0,0,"L");
//$pdf->Cell(87.5,20,'TransactionId: #5408',0,0,"R");
$pdf->Cell(7.25,20,'',0,0);


//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,5,'',0,1);//end of line
//Cell(width , height , text , border , end line , [align] )
$pdf->Cell(7.25,20,'',0,0);
$pdf->Cell(174.5,20,'Mobile: +8801773654647',0,0,"L");
$pdf->Cell(7.25,20,'',0,0);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,30,'',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

//Cell(width , height , text , border , end line , [align] )
$pdf->Cell(7.25,20,'',0,0);
$pdf->Cell(47.25,20,'Customer Name  : '.$user_name,0,0,"L");
$pdf->Cell(80.25,20,'',0,0);
$pdf->Cell(7.25,20,'Mobile: '.$phone,0,0,"L");

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,20,'',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','B',14);
//Cell(width , height , text , border , end line , [align] )
$pdf->Cell(7.25,10,'',0,0);
$pdf->Cell(118.16,10,'Medcine Name',1,0,"C");
$pdf->Cell(28.16,10,'Quantity',1,0,"C");
$pdf->Cell(28.25,10,'Price',1,0,"C");
$pdf->Cell(7.25,10,'',0,0);

////make a dummy empty cell as a vertical spacer
//$pdf->Cell(189	,10,'',0,1);//end of line
////
////set font to arial, regular, 12pt
//$pdf->SetFont('Arial','',12);
//
//$pdf->Cell(7.25,10,'',0,0);
//$pdf->Cell(118.16,10,'LevoFloxacin 500',1,0,"C");
//$pdf->Cell(28.16,10,'1',1,0,"C");
//$pdf->Cell(28.25,10,'100 Taka',1,0,"C");
//$pdf->Cell(7.25,20,'',0,0);

//make a dummy empty cell as a vertical spacer
$seat_count=0; $total_price=0;   while ($row = $result->fetch_assoc()) {
$pdf->Cell(189	,10,'',0,1);//end of line

$pdf->Cell(7.25,10,'',0,0);
$pdf->Cell(118.16,10,$row['M_name'],1,0,"C");
$pdf->Cell(28.16,10,$row['quantity'],1,0,"C");
$name=$row['M_name'];
$n=$row['quantity'];                                                                 
$result_price = $conn->query("SELECT `medicine_price` FROM `medicine` WHERE `medicine_name`='$name'");
while ($row = $result_price->fetch_assoc()) {
    $p=$row['medicine_price']* $n; 
    $total_price=$total_price+$p;
    
}
$pdf->Cell(28.25,10,$p.' Taka',1,0,"C");
$pdf->Cell(7.25,20,'',0,0);
}
//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line
//set font to arial, regular, 12pt
$pdf->SetFont('Arial','B',14);
$pdf->Cell(7.25,10,'',0,0);
$pdf->Cell(146.32,10,'Total',1,0,"C");
$pdf->Cell(28.25,10,$total_price.' Taka',1,0,"C");
$pdf->Cell(7.25,20,'',0,0);


//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,20,'',0,1);//end of line


//set font to arial, regular, 12pt
$pdf->SetFont('Arial','B',14);
$pdf->Cell(47.25,20,'',0,0);
$pdf->Cell(94.5,20,'Sold By: Ayon Dey-The Susheel (Manager)',0,0,"C");
$pdf->Cell(47.25,20,'',0,0);























$pdf->Output();

$deleteMedicine_list="DELETE FROM `medicine_list` WHERE 1";
    if($conn->query($deleteMedicine_list)==true){
        
    }else{
        die($conn->error);
    }
}
else {
    header("Location:login.php");
}
?>
