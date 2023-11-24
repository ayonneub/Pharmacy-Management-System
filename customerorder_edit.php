<?php
session_start();
?>
<?php
if (isset($_SESSION['username'])) {
    ?>
    <?php
    include "connectdb.php";
    $update_number = $_GET['mobile_number'];
    $fetchQuery = "SELECT * from customer where mobile_number='$update_number'";
    $result = $conn->query($fetchQuery);
    $row = $result->fetch_assoc();

    if (isset($_POST['updateData'])) {




        $customer_name = $_POST['customer_name'];
        $mobile_number = $_POST['mobile_number'];
        $customer_address = $_POST['customer_address'];

        $updateQuery = "UPDATE customer SET mobile_number='$mobile_number',customer_name='$customer_name',customer_address='$customer_address' WHERE mobile_number='$update_number'";

        if ($conn->query($updateQuery) == true) {
            header("Location: customer.php");
        } else {
            die($conn->error);
        }
    }
    ?>
    <!DOCTYPE html>

    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Edit Customer</title>
            <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
        </head>
        <body>
            <div class="container">
                <div class="jumbotron">
                    <h2 class="text-center">Edit Customer Info</h2>
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" style="width:60%; margin:0 auto;">
                        <label for="">Enter Customer Name: </label>
                        <input type="text" class="form-control form-group" name="customer_name" value="<?php echo $row['customer_name']; ?>" />
                        <label for="">Enter Customer Mobile Number: </label>
                        <input type="text" class="form-control form-group" name="mobile_number" value="<?php echo $row['mobile_number']; ?>" />
                        <label for="">Enter Customer Address: </label>
                        <input type="text" class="form-control form-group" name="customer_address" value="<?php echo $row['customer_address']; ?>" />

                        <input type="submit" class="btn btn-success" name="updateData" value="Update Data"/>

                    </form>
                </div>

            </div>

        </body>
    </html>
    <?php
} else {
    header("Location:login.php");
}
?>