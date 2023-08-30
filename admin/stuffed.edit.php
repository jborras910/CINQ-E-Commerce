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
            $query ="SELECT * FROM stuffed_product WHERE id='$id'";
            $query_run = mysqli_query($connection, $query);
            foreach($query_run as $row){
                ?>
        <form action="stuffed.function.php" method="POST" autocomplete="off" enctype="multipart/form-data">
            <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">
            <?php echo'<img src="../product_img/'.$row['product_image'].'" style="width:250px"alt="image"/>' ?>
            <div>
                <label for="image">Upload Product Image</label>
                <br>
                <input type="file" name="faculty_images" id="faculty_images" value="<?php echo $row['product_image']?>">
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
            <div>
                <label for="image">Upload Product modal image</label>
                <br>
                <input type="file" name="edit_faculty_images_2" value="<?php echo $row['modal_images']?>"
                    id="edit_faculty_images_2" require>
            </div>

            <br>
            <a href="stuffed.product.php" class="btn btn-danger">Cancel</a>
            <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
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
