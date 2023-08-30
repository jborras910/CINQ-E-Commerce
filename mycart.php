<?php 
  
   include_once 'header.php';
   
   if(!isset($_SESSION['auth_user']['usersUid'])){
    $_SESSION["status"] = 'You need to login first';
    echo"<script>window.location.href='login.php?error=loginfirst';</script>";
   }
   
?>
<style>
@media screen and (max-width: 1200px) {
    .card {
        width: 100% !important;

    }
}

</style>


















<link rel="stylesheet" type="text/css" href="css/mycart.css?<?php echo time(); ?>" />


<div class="container-fluid cart" style="width:80%">



    <div class="row d-flex justify-content-center">
        <div class="col-lg-12 ">
            <h3 class='text-center'>MY
                CART</h3>
            <hr class="mb-4 mt-0">
        </div>
        <div class="col-lg-9 row ">
            <?php 
                
                  
                  
                    if(isset($_SESSION['cart'])){
                        foreach($_SESSION['cart'] as $key => $value){
                            $sr = $key+1;
                            echo "
    
                     <div class='card' style='width:245px;'>
                        <img class='card-img-top' src='product_img/$value[item_img]' alt='Card image cap'>
                        <div class='card-body'>
                          
                            <p class='card-text'>Product Name: $value[item_name]</p>
                     
                            <p class='card-text'>Price: &#8369;$value[price] <input type='hidden' class='iprice' value='$value[price]'></p>
                            <form action='manage_cart.php' method='POST'>
                            <p class='card-text'>Quantity: <input type='number' name='Mod_Quantity' onchange='this.form.submit();' class='text-center iquantity' value='$value[Quantity]' min='1' max='10'></p>
                            <p class='card-text'>Total: <span class='itotal'></span></p>
                            <input type='hidden' name='item_name' value='$value[item_name]'>
                        </form>
                        <form action='manage_cart.php' method='POST'>
                        <button name='remove_item' class='btn btn-danger mt-2 btn-block'>Remove</button>
                        <input type='hidden' name='item_name' value='$value[item_name]'>
                        </form>
                            
                        </div>
                    </div>
  
                            ";
                        }
                        $count= count($_SESSION['cart']);
                    }
                    ?>

        </div>


        <div class="col-lg-3 mt-5">
            <div class=" bg-light rounded total-card">



                <h4>Grand Total:</h4>
                <?php 
                if(isset($_SESSION['cart']) && count($_SESSION['cart']) >0){
                ?>

                <form action="purchase.php" method='POST'>

                    <!-- Set up a container element for the button -->

                    <h6>Shipping fee: 70</h6>
                    <?php echo "" . date("Y/m/d") . "<br>";?>
                    <input type="hidden" name="date" value='<?php echo "" . date("Y/m/d") . "";?>'>

                    <h4 class="text-right " id="">₱<span id='gtotal'></span></h4>

                    <input type='hidden' name='amount' id='gtotalinput'>

                    <br>

                    <div id="paypal-button-container"></div>
                </form>
                <?php   }else{
                      echo "<h6 class='text-right '>&#8369;<span id=''>0</span></h6>";
                }
                    
                    ?>
            </div>
        </div>







        <!---total/end--->

    </div>
    <hr class="mb-4 mt-5">
</div>

<script>
var gt = 0;
var shipping_fee = 70;
var iprice = document.getElementsByClassName('iprice');
var iquantity = document.getElementsByClassName('iquantity');
var itotal = document.getElementsByClassName('itotal');
var gtotal = document.getElementById("gtotal");


function subtotal() {
    gt = 0;
    for (i = 0; i < iprice.length; i++) {
        itotal[i].innerText = (iprice[i].value) * (iquantity[i].value);
        gt = gt + (iprice[i].value) * (iquantity[i].value);
    }

    gtotal.innerText = gt + shipping_fee;

    document.getElementById("gtotalinput").value = gtotal.innerText;


}

subtotal();
</script>




<!-- Replace "test" with your own sandbox Business account app client ID -->
<script
    src="https://www.paypal.com/sdk/js?client-id=AcGnreQIdtqrUMKkAQecaK0nxCG8AH1FJ7IYdwGCp3iLI-Z4MRBYvOGlMLtsaEmtAiTecRWFwwI0ON_i&currency=PHP">
</script>
<script>
paypal.Buttons({
    // Sets up the transaction when a payment button is clicked
    createOrder: (data, actions) => {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: gtotal.innerText
                }

            }]
        });
    },

    // Finalize the transaction after payer approval
    onApprove: (data, actions) => {
        return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            alert(
                `Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`
            );
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
        });
    }
}).render('#paypal-button-container');
</script>















<?php 
  include_once 'footer.php';

?>
