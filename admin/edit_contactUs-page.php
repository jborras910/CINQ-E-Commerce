<?php 
include('security.php'); 
$page = 'Edit';
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">
    <div class="main-container">
        <h1>Contact Us Page</h1>
        <hr>
        <?php 
        $connection = mysqli_connect("localhost", "root", "", "project01");
        if(isset($_POST['edit_btn'])){
            $id = $_POST['edit_id'];
            $query ="SELECT *  FROM contactuspage WHERE id='$id'";
            $query_run = mysqli_query($connection, $query);
            foreach($query_run as $row){
                ?>
        <form action="contactUspage.fuction.php" method="POST">
            <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">
            <div class="form-group">
                <input type="text" name="edit_title" value="<?php echo $row['title']?>" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="edit_sub_title" value="<?php echo $row['sub_title']?>" class="form-control">
            </div>
            <div class="form-group">
                <textarea type="text" name="edit_descriptions" value="<?php echo $row['descriptions']?>"
                    class="form-control"></textarea>

            </div>
            <a class="btn btn-danger" href="contactUs-page.php">Cancel</a>
            <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
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
