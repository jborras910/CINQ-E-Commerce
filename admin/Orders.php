<?php 



$page = 'Orders';
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 


?>


<div class="container-fluid">

    <div class="table-container">
        <h1>Users Order Tracker</h1>
        <br>
        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Customers Name</th>
                    <th scope="col">Phone no</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email</th>
                    <th scope="col">Pay_mode</th>
                    <th scope="col">Orders</th>

                </tr>
            </thead>
            <tbody>
                <?php

                $query = "SELECT * FROM `order_manager`";
                $user_result = mysqli_query($connection,$query);
                while($user_fetch = mysqli_fetch_assoc($user_result)){
                    echo"
                    <tr>
                    <th scope='col'>$user_fetch[Order_id]</th>
                    <th scope='col'>$user_fetch[full_name]</th>
                    <th scope='col'>$user_fetch[Contact]</th>
                    <th scope='col'>$user_fetch[Address]</th>
                    <th scope='col'>$user_fetch[Email]</th>
                    <th scope='col'>$user_fetch[Pay_mode]</th>
                    <th scope='col'>

                    <table class='table text-center border bg-secondary  text-white' >
                    <thead >
                        <tr >
                            <th scope='col'>Item Name</th>
                            <th scope='col'>Price</th>
                            <th scope='col'>Quantity</th>
                        </tr>
                    </thead>
                    <tbody >
                    ";
                    $order_query = "SELECT * FROM `user_orders` WHERE `Order_id` = $user_fetch[Order_id]";
                    $order_result = mysqli_query($connection,$order_query);
                    while($order_fetch=mysqli_fetch_assoc($order_result)){
                        echo"
                            <tr>
                            <th scope='col'>$order_fetch[item_name]</th>
                            <th scope='col'>$order_fetch[Price]</th>
                            <th scope='col'>$order_fetch[Quantity]</th>
                    
                            </tr>
                        ";
                    }
                    $query = "SELECT SUM(Price), SUM(Quantity) FROM user_orders WHERE `Order_id` = $user_fetch[Order_id]";
                    $query_run = mysqli_query($connection,$query);
                    while($row = mysqli_fetch_array($query_run)){
                        

                        echo " <th scope='col'>Total: </th>
                               <th scope='col'>" . $row['SUM(Price)'] .  "</th>
                               <th scope='col'>" . $row['SUM(Quantity)'] .  "</th>
                     
                               
                               ";
                               
                 

                 }

                    

          
                    echo "
                            <tbody>
                          </table>
                    </th>
                </tr>
                    
                    ";
                }
                ?>



            </tbody>
        </table>

    </div>

</div>


<?php 

include('includes/script.php');

?>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script> <!-- Page level plugins -->
