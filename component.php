<?php 


function component($product_id, $productname, $productprice, $productimage, $modal_image){
    $element = "
    <div class='col-md-4 col-sm-6 my-3 my-md-0 '>
            <form action='manage_cart.php' method='POST'>
                <div class='card shadow'>
                    <div>
                        <img src='product_img/$productimage' alt='img-1'
                            class='img-fluid card-img-top'>
                    </div>
                    <input type='hidden' name='item_img' value='$productimage'>
                    <div class='card-body'>
                        <h5 class='card-title'>$productname</h5>
                        <input type='hidden' name='item_name' value='$productname'>

                        <h6>
                            <li class='fas fa-star'></li>
                            <li class='fas fa-star'></li>
                            <li class='fas fa-star'></li>
                            <li class='fas fa-star'></li>
                            <li class='far fa-star'></li>
                        </h6>
        
                        <div class='product-price'>
                            <h5>
                            <small><s class='text-secondary'>&#8369;510</s></small>
                            <span class='price'>&#8369;$productprice.00</span>
                            <input type='hidden' name='item_price' value='$productprice'>
                            </h5>
                        </div>
                        <button type='submit' class='btn btn-warning my-3' name='add_to_cart'><i
                        class='fas fa-shopping-cart'></i>Add to Cart</button>
                   
                        <input type='hidden' name='product_id' value='$product_id'/>
                    </div>
                </div>
            </form>
        </div>
      

        <!-- Modal -->
        <div class='modal fade' id='G' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>Modal title</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>
            $productname
            $product_id
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                <button type='button' class='btn btn-primary'>Save changes</button>
            </div>
            </div>
        </div>
        </div>
    ";
    echo  $element;
}
