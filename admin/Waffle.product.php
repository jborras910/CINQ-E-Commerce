<?php 

$page = 'MenuPage';
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="container-fluid">
    <div class="main-container">
        <h1>Waffle Products</h1>
        <hr>

        <button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#exampleModalCenter">
            Add New Product</button>
        <br>
        <br>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h5 class="modal-title">Add Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="Waffle.function.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div>
                                <label for="image">Upload Product Image</label>
                                <br>
                                <input type="file" name="faculty_images" id="faculty_images" require>
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="text" name="title" class="form-control" require placeholder="Title..">
                            </div>
                            <div class="form-group">
                                <input type="number" name="price" class="form-control" require placeholder="Price..">
                            </div>

                            <div class="form-group">
                                <textarea type="text" name="description" class="form-control" require
                                    placeholder="Description.."></textarea>
                            </div>
                            <div>
                                <label for="image">Upload Product modal image</label>
                                <br>
                                <input type="file" name="faculty_images_2" id="faculty_images_2" require>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="add_product" class="btn btn-primary">Save</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
        <div class="container-fluid row">
            <?php   
      $connection = mysqli_connect("localhost", "root", "", "project01");


        $query = "SELECT * FROM Waffle_product";
        $query_run = mysqli_query($connection, $query);
      
      
      ?>

            <?php  
      if(mysqli_num_rows($query_run) >0){
        while($row=mysqli_fetch_assoc($query_run)){
        
          ?>
            <div class="col-md-3">

                <div class="container-fluid text-center">
                    <div class='card shadow mt-2 '>
                        <div>
                            <?php echo'<img src="../product_img/'.$row['product_image'].'" style="width:100%"alt="image"/>' ?>
                        </div>
                        <input type='hidden' name='item_img' value='$productimage'>
                        <div class='card-body'>
                            <h5 class='card-title'><?php  echo $row['title'];?></h5>
                            <div class='product-price'>
                                <h5>
                                    <span class='price'>&#8369;<?php  echo $row['price'];?>.00</span>

                                </h5>
                            </div>
                            <form action="Waffle.edit.php" method="POST" class="text-center">
                                <input type="hidden" name="edit_id" value="<?php  echo $row['id'];?>">
                                <button type="submit" name="edit_btn"
                                    class="btn btn-success btn-block mb-2">EDIT</button>
                            </form>
                            <form action="Waffle.function.php" method="post">
                                <input type="hidden" name="delete_id" value="<?php echo $row['id']?>">
                                <button type="submit" name="delete_btn" class="btn btn-danger btn-block">DELETE</button>
                            </form>


                        </div>
                    </div>
                </div>

            </div>

            <?php
        }
       }else{
         echo"No record found";
       }
       ?>


        </div>
    </div>
</div>

<?php 

include('includes/script.php');
?>
