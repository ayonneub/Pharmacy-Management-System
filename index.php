<?php
session_start();
?>
<?php
if (isset($_SESSION['username'])) {
    ?>

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Pharmacy Management</title>
            <link rel="stylesheet" href="css/bootstrap.css">
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <!--header html start-->
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10">
                            <h1 class="display-6 text-center">Pharmacy Management System</h1>
                        </div>
                           <div class="col-lg-1">
                          <a class="btn btn-warning"  href="null.php">Alert</a> 
                        </div>
                        <div class="col-lg-1">
                            <a class="btn btn-danger"  href="logout.php">Log Out</a> 
                      
                        </div>
                     
                    </div>
<!--                    <div class="header">

                    </div>-->
                </div>
            </div>
            <!--start content html-->
            <div class="content-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box-1">
                                <div class="carousel-inner">
                                    <a href="customer.php">
                                        <div class="carousel-item active">
                                            <img src="images/scientist.jpg" alt="..." class="img-fluid">
                                            <div class="carousel-caption">
                                                <h5 >Customer</h5>
                                            </div>
                                        </div></a>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-2">
                                <div class="carousel-inner">
                                    <a href="medicine.php">  <div class="carousel-item active">
                                            <img src="images/drugs.jpg" alt="..." class="img-fluid">
                                            <div class="carousel-caption">
                                                <h5 class="">Medicine</h5>
                                            </div>
                                        </div></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-1">
                                <div class="carousel-inner">
                                    <a href="pharmacyorder.php" > <div class="carousel-item active">
                                            <img src="images/order%20(2).jpg" alt="..." class="img-fluid">
                                            <div class="carousel-caption">
                                                <h5 class="">Pharmacy Order</h5>
                                            </div>
                                        </div></a>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-md-4">
                            <div class="box-2">
                                <div class="carousel-inner">
                                    <a href="supplier.php"> <div class="carousel-item active">
                                            <img src="images/supplier.jpg" alt="..." class="img-fluid">
                                            <div class="carousel-caption">
                                                <h5 class="">Supplier</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-1">
                                <div class="carousel-inner">
                                    <a href="customerorder.php" > <div class="carousel-item active">
                                            <img src="images/customer.jpg" alt="..." class="img-fluid custom-height">
                                            <div class="carousel-caption">
                                                <h5 class="">Customer Order</h5>
                                            </div>
                                        </div></a>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="box-2">
                                <div class="carousel-inner">
                                    <a href="manager.php"> <div class="carousel-item active">
                                            <img src="images/1.jpg" alt="..." class="img-fluid custom-height">
                                            <div class="carousel-caption">
                                                <h5 class="">Manager</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>                
                </div>   
            </div>






            <!--footer start-->

            <div class="footer">
                <div class="container center">
                    <nav class="navbar bg-dark navbar-dark navbar-expand-sm">

                    </nav>  
                </div>

            </div>





            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>  
        </body>
    </html>
    <?php
} else {
    header("Location:login.php");
}
?>








