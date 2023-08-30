<?php 

$page = 'MenuPage';
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="container-fluid">
    <?php include('alert.php');?>
    <div class="main-container">

        <h1>Cheesecake products</h1>
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
                    <form action="Cheesecake.function.php" method="POST" autocomplete="off"
                        enctype="multipart/form-data">
                        <div class="modal-body">
                            <div>
                                <img class="" id="blah" src="#" alt="" width="100%;" height="400px">

                                <hr>
                                <label for="image">Upload Product Image</label>
                                <br>
                                <input type="file" accept="image/*" onchange="previewImage();" name="faculty_images"
                                    id="faculty_images" require>



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
        $query = "SELECT * FROM cheesecake_product";
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
                            <?php echo'<img src="../product_img/'.$row['product_image'].'" style="width:100%; height:280px;"alt="image"/>' ?>
                        </div>
                        <input type='hidden' name='item_img' value='$productimage'>
                        <div class='card-body'>
                            <h5 class='card-title'><?php  echo $row['title'];?></h5>
                            <h6><?php echo $row['descriptions']?></h6>
                            <hr>
                            <div class='product-price'>
                                <h5>
                                    <span class='price'>&#8369;<?php  echo $row['price'];?>.00</span>

                                </h5>
                            </div>
                            <form action="Cheesecake.edit.php" method="POST" class="text-center">
                                <input type="hidden" name="edit_id" value="<?php  echo $row['id'];?>">
                                <button type="submit" name="edit_btn"
                                    class="btn btn-success btn-block mb-2">EDIT</button>
                            </form>
                            <form action="Cheesecake.function.php" method="post">
                                <input type="hidden" name="delete_id" value="<?php echo $row['id']?>">



                                <button type="button" class="btn btn-danger btn-block" data-toggle="modal"
                                    data-target="#exampleModalCenter<?php  echo $row['id'];?>">
                                    DELETE
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter<?php  echo $row['id'];?>" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Warning!!</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?php echo'<img src="../product_img/'.$row['product_image'].'" style="width:100%; height:280px;"alt="image"/>' ?>
                                                <hr>
                                                <h5>Are you sure you want to delete product ID:<?php  echo $row['id'];?>
                                                    ??</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>

                                                <button type="submit" name="delete_btn"
                                                    class="btn btn-danger ">DELETE</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
    <br>
    <hr>
</div>

<?php 

include('includes/script.php');
?>
<script>
function toggleCheckbox(box) {
    var id = $(box).attr("value");

    if ($(box).prop("checked") == true) {
        var visible = 1;
        var delete_btn = document.getElementById("form_delete_btn");
        delete_btn.classList.add("btn-danger");
        delete_btn.classList.remove("btn-primary");
    } else {
        var visible = 0;
        var delete_btn = document.getElementById("form_delete_btn");
        delete_btn.classList.add("btn-primary");
        delete_btn.classList.remove("btn-danger");
    }
    var data = {
        "search_data": 1,
        "id": id,
        "visible": visible
    };

    $.ajax({
        type: "post",
        url: "code.php",
        data: data,
        success: function(response) {

        }

    });

}
</script>


<script>
faculty_images.onchange = evt => {
    const [file] = faculty_images.files
    if (file) {
        blah.src = URL.createObjectURL(file)
    }
}
</script>
