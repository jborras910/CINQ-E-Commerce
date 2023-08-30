<?php 
session_start();

require_once 'includes/dbh.inc.php';


if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    if(isset($_POST['purchase'])){
      $query1 = "INSERT INTO `order_manager`(`full_name`, `Contact`, `Address`, `Email`, `Pay_mode`) 
      VALUES ('$_POST[customer_full_name]',
      '$_POST[customer_contact]',
      '$_POST[customer_address]',
      '$_POST[customer_email]',
      '$_POST[pay_mode]')";

      if(mysqli_query($conn, $query1)){
        $Order_Id = mysqli_insert_id($conn);
        $query2 = "INSERT INTO `user_orders`(`Order_id`, `item_name`, `Price`, `Quantity`) VALUES (?,?,?,?)";
        $stmt = mysqli_prepare($conn, $query2);
        if($stmt){
        mysqli_stmt_bind_param($stmt,"isii", $Order_Id, $Item_name,$Price,$Quantity);
        foreach($_SESSION['cart'] as $key => $values){
            $Item_name = $values['item_name'];
            $Price = $values['price'];
            $Quantity = $values['Quantity'];
            mysqli_stmt_execute($stmt);
        }
        unset($_SESSION['cart']);
        echo"<script>alert
        ('Order placed');
        window.location.href='javascript:history.go(-1)';
        </script>";

        }else{
            echo"<script>alert
            ('error');
            window.location.href='javascript:history.go(-1)';
            </script>";
        }


      }else{
        echo"<script>alert
        ('data doest not submit');
        window.location.href='javascript:history.go(-1)';
        </script>";
      }
 
    }
}
