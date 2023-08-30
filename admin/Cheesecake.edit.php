<?php 

include('security.php'); 
$page = 'Edit';
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">
    <div class="main-container">
        <h1>Update product</h1>
        <hr>
        <?php 
        $connection = mysqli_connect("localhost", "root", "", "project01");
        if(isset($_POST['edit_btn'])){
            $id = $_POST['edit_id'];
            $query ="SELECT * FROM cheesecake_product WHERE id='$id'";
            $query_run = mysqli_query($connection, $query);
            foreach($query_run as $row){
                ?>
        <form action="Cheesecake.function.php" method="POST" autocomplete="off" enctype="multipart/form-data">
            <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">
            <div>

                <?php echo'<img src="../product_img/'.$row['product_image'].'"  id="blah" src="#" alt="" width="100%;" height="400px" style="width:250px"alt="image"/>' ?>
                <br>
                <br>
                <label for="image">Change Product Image</label>
                <br>
                <input type="file" accept="image/*" onchange="previewImage();" name="faculty_images" id="faculty_images"
                    value="<?php echo '../product_img/'.$row['product_image'] ?>">



            </div>
            <br>
            <div class="form-group">
                <input type="text" name="edit_title" value="<?php echo $row['title']?>" class="form-control" require
                    placeholder="Title..">
            </div>
            <div class="form-group">
                <input type="number" name="edit_price" value="<?php echo $row['price']?>" class="form-control" require
                    placeholder="Price..">
            </div>

            <div class="form-group">
                <textarea type="text" name="edit_description" class="form-control" require
                    placeholder="Description.."><?php echo $row['descriptions']?></textarea>
            </div>
            <br>
            <a href="Cheesecake.product.php" class="btn btn-danger">Cancel</a>




            <button type="button" class="btn btn-primary " data-toggle="modal"
                data-target="#exampleModalCenter<?php  echo $row['id'];?>">
                Update
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter<?php  echo $row['id'];?>" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Warning!!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php echo'<img src="../product_img/'.$row['product_image'].'" style="width:100%; height:280px;"alt="image"/>' ?>
                            <hr>
                            <h5>Are you sure you want to update product ID:<?php  echo $row['id'];?>
                                ??</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div>



    </div>
    </form>
    <?php
            }
            
        }
    ?>
</div>
</div>

<?php 
include('includes/script.php');
?>


<script>
faculty_images.onchange = evt => {
    const [file] = faculty_images.files
    if (file) {
        blah.src = URL.createObjectURL(file)
    }
}
</script>
