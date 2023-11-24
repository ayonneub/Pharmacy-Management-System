<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include './connectdb.php';


//
$fetchQuery = "SELECT `medicine_name` FROM `medicine` WHERE 1";
$result = $conn->query($fetchQuery);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <!--<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>-->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <style>
            * { font-family:Arial; }
            h2 { padding:0 0 5px 5px; }
            h2 a { color: #224f99; }
            a { color:#999; text-decoration: none; }
            a:hover { color:#802727; }
            p { padding:0 0 5px 0; }
            select{
                padding: 6px 5px;
            }
            input { padding:5px; border:1px solid #999; border-radius:4px; -moz-border-radius:4px; -web-kit-border-radius:4px; -khtml-border-radius:4px; }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </button>
                    <a class="navbar-brand" href="#">Pharmacy</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                          <li>
                            <a class="" href="index.php">Home</a>
                        </li>

                        <li>
                            <a  href="customer.php">Customer</a>
                        </li> 
                        <li>
                            <a  href="supplier.php">Supplier</a>
                        </li> 
                        <li>
                            <a  href="customerorder.php">Customer Order</a>
                        </li>
                        <li>
                            <a  href="pharmacyorder.php">Pharmacy Order</a>
                        </li>
                        <li>
                            <a  href="manager.php">Manager</a>
                        </li>
                        <li>  <a href="logout.php">Log Out</a></li>
                    </ul>
                  
                </div>
            </div>
        </nav>
    

        <div class="container">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">


                    <div class="col-sm-6 co-sm-offset-3">
                        <form id="myForm" action="add_data2.php" method="post">
                            <p>
                            <h3>Medicine     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Quantity</h3>
                            <select id="medicine_name" name="p_medicin" >
                                <?php while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $row['medicine_name']; ?>"><?php echo $row['medicine_name']; ?></option>
                                <?php } ?>
                            </select>
                            <label for="p_scnts"><input type="number" id="quantity" size="20" name="p_scnt" value="" placeholder="" /></label>
                            </p>
                            <!--<input type="submit" id="add" name="insert_order" class="form-control btn btn-primary">-->
                            <button id="sub">Add</button>
                        </form>
                    </div>

                </div>

            </div>
            <div class="row" id="a">
                <form action="recit2.php" method="post">
                    <div class="col-sm-12">
                        <h3 class="text-center">Order Purchasing</h3>   
                        <div class="form-group col-sm-6">
                            <label for="from">Name</label>
                            <input type="text" name="name" class="form-control" id="from" placeholder="Enter Name" required >
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="to">Phone Number</label>
                            <input type="number" name="phone_number" class="form-control" id="to" placeholder="Enter Phone Number" required>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="col-sm-2">

                        </div>
                        <div id="show">
                            <div class="table-responsive col-sm-8">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Medicine</th>
                                            <th>Quantity</th>
                                            <th>Cost</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td colspan=2> <strong>Selected Medicine: 0</strong></td>
                                            <td colspan=2><strong>Total: BDT </strong></td>
                                        </tr>
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                        <div class="col-sm-2">

                        </div>
                    </div>
                    <div class="row"><div class="col-sm-4"></div>
                        <div class="col-sm-8">
                            <button type="submit" name="recit2" id="insert" class="btn btn-success">Continue</button>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>


                </form>
            </div>

        </div>


        <script src="jquery-3.2.1.min.js" type="text/javascript"></script>



        <script>


            $("#sub").click(function () {
                $.post($("#myForm").attr("action"),
                        $("#myForm :input").serializeArray(),
                        function (info) {
                            $("#result").html(info);
                            clearInput();
                        });
            });
            function clearInput() {
                $("#myForm :input").each(function () {
                    $(this).val('');
                });
            }

            $("#myForm").submit(function () {
                return false;
            });



        </script>

        <script type="text/javascript">
            $(document).ready(function () {
                setInterval(function () {
                    $('#show').load('loaddata2.php')
                });
            });
        </script>          


    </body>
</html>
